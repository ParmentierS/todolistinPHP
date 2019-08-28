
const listthingstodo = document.getElementById("thingstodo").getElementsByTagName("UL");
const thingstodo = document.getElementById("thingstodo").getElementsByTagName("LI");
const checkboxtodo = document.getElementById("thingstodo").getElementsByTagName("INPUT");
const listthingsdone = document.getElementById("thingsdone").getElementsByTagName("UL");
const thingsdone = document.getElementById("thingsdone").getElementsByTagName("LI");

console.log("choses à faire", thingstodo);
console.log("choses à ne plus faire", thingsdone);

let jsonCompleteList = [];

fetch('./todo.json')
    .then(response => 
    {
        return response.json();
    })
    .then(data => 
    {
        // Work with JSON data here
        jsonCompleteList = data;
        
    })
    .catch(err => 
    {
        console.log("erreur incompréhensible")
    })

const addButton = document.getElementById("add-item");

for(let i=0; i<checkboxtodo.length; i++)
{
    checkboxtodo[i].addEventListener("click", ()=>
    {
        const itemName = thingstodo[i].getElementsByTagName("LABEL").value;

        for(let i=0;i<jsonCompleteList.length;i++)
        {
            if(itemName===jsonCompleteList[i].aim)
            {
                jsonCompleteList.done=!jsonCompleteList.done;
            }
        }     
    })
}

addButton.addEventListener("click", ()=>
{
    
})