/**
 * Created by thobber on 13.02.17.
 */
/** @namespace item.categories[0].category */
/** @namespace item.categories.category */
/** @namespace item.categories */

// Function to ask API, returns JSON
function readTextFile(file, callback)
{
    let rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function ()
    {
        if (rawFile.readyState === 4 && rawFile.status == "200")
        {
            callback(rawFile.responseText);
        }
    };
    rawFile.send(null);
}

// Ask API for all categories
const responseCategories = "http://158.39.162.161/api/categories";
readTextFile(responseCategories, function (text)
{
    const ul_categoryList = document.getElementById("category-list");

    const data = JSON.parse(text);
    for (const item of Object.values(data))
    {
        const categories = item.category[language];

        const categories_a = document.createElement("a");
        const categories_li = document.createElement("li");

        categories_a.textContent = categories;
        categories_a.setAttribute("href", "#");

        categories_li.appendChild(categories_a);
        ul_categoryList.appendChild(categories_li);
    }
});

// Ask API for all items
const responseItems = "http://158.39.162.161/api/items";

readTextFile(responseItems, function (text)
{

    const ul_itemList = document.getElementById("main-list");

    const data = JSON.parse(text);
    for (const item of Object.values(data))
    {
        const items_a = document.createElement("a");
        const items_li = document.createElement("li");
        items_a.textContent = item["item_name"];
        items_a.setAttribute("href", "itempage.php?itemId=" + item._id);

        items_li.appendChild(items_a);
        ul_itemList.appendChild(items_li);
    }
});

// Ask API for specific item
const responseItem = "http://158.39.162.161/api/items/" + itemId;

readTextFile(responseItem, function (text)
{
    const data = JSON.parse(text);

    const title = data.item_name;
    const description = data.description[language];
    const image = data.image_url;

    document.getElementById("item").innerHTML = title;
    document.getElementById("description").innerHTML = description;
    document.getElementById("item_image").src = image;
});

// Function gotten from http://stackoverflow.com/questions/6899097/how-to-add-a-parameter-to-the-url, by user: hakre
function setParam(name, value)
{
    const l = window.location;

    /* build params */
    const params = {};
    const x = /(?:\??)([^=&?]+)=?([^&?]*)/g;
    const s = l.search;
    for(let r = x.exec(s); r; r = x.exec(s))
    {
        r[1] = decodeURIComponent(r[1]);
        if (!r[2]) r[2] = '%%';
        params[r[1]] = r[2];
    }

    /* set param */
    params[name] = encodeURIComponent(value);

    /* build search */
    let search = [];
    for(let i in params)
    {
        let p = encodeURIComponent(i);
        const v = params[i];
        if (v != '%%') p += '=' + v;
        search.push(p);
    }
    search = search.join('&');

    /* execute search */
    l.search = search;
}