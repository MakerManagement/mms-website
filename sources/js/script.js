/**
 * Created by thobber on 13.02.17.
 */
/** @namespace item.categories[0].category */
/** @namespace item.categories.category */
/** @namespace item.categories */

const responseItems = "sources/json/response-items.json";
const responseCategories = "sources/json/response-categories.json";

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

readTextFile(responseItems, function (text)
{

    const ul_itemList = document.getElementById("main-list");

    const data = JSON.parse(text);
    for (const item of Object.values(data))
    {
        const items_a = document.createElement("a");
        const items_li = document.createElement("li");
        items_a.textContent = item["item_name"];
        items_a.setAttribute("href", "#");

        items_li.appendChild(items_a);
        ul_itemList.appendChild(items_li);
    }
});