/**
 * Created by thobber on 13.02.17.
 */
/** @namespace item.categories[0].category */
/** @namespace item.categories.category */
/** @namespace item.categories */

const language = "eng";

function readTextFile(file, callback)
{
    const rawFile = new XMLHttpRequest();
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

readTextFile("sources/json/response-categories.json", function (text)
{
    const ul_categoryList = document.getElementById("category-list");

    const data = JSON.parse(text);
    for (const item of Object.values(data))
    {
        const categories = item.category[language];
        //const description = item["description"][language];

        const categories_a = document.createElement("a");
        const categories_li = document.createElement("li");

        categories_a.textContent = categories;
        categories_a.setAttribute("href", "#");

        categories_li.appendChild(categories_a);
        ul_categoryList.appendChild(categories_li);

        console.log(categories);
        //console.log(description);
    }
});

readTextFile("sources/json/response-items.json", function (text)
{

    const ul_itemList = document.getElementById("main-list");

    const data = JSON.parse(text);
    for (const item of Object.values(data))
    {
        const items_a = document.createElement("a");
        const items_li = document.createElement("li");
        //const categories = item.categories.category[language];
        const itemName = item["item_name"];

        items_a.textContent = itemName;
        items_a.setAttribute("href", "#");

        items_li.appendChild(items_a);
        ul_itemList.appendChild(items_li);

        //console.log(categories);
        console.log(itemName);
    }
});