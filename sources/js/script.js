/**
 * Created by thobber on 13.02.17.
 */

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

readTextFile("sources/json/response.json", function (text)
{
    const data = JSON.parse(text);
    const language = "eng";
    for (const item of Object.values(data))
    {
        const categories = item.categories[0].category[language];
        const description = item["description"][language];
        console.log(categories);
        console.log(description);
    }
});