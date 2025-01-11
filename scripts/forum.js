// Add Event-Listener to send-button
document.getElementById("btn_ask_question").addEventListener("click", () => {
    const formData = getFormValues();

    if(formData === null){
        alert("Bitte füllen Sie alle Felder aus!")
    }else{
        confirm(`Neue Frage wurde erstellt:\n\nTitel: ${formData["Titel"]}\nThemenbereich: ${formData["Themenbereich"]}\nTags: ${formData["Tags"]}\nFrage: ${formData["Frage"]}`);
        location.href = "index.php?page=forum";
    }
})

// Add Event-Listener to add-button
document.getElementById("btn_add_tag").addEventListener("click", () => {
    const input = document.getElementById("input_tags");

    if(isValid(input)){
        console.log(input.value);
        addTag(input.value);
        input.value = "";
    }
    
})

// Get form values from forum-form
function getFormValues(){
    let formData = {};

    // Check if Input is valid - else return null
    if(isValid(document.querySelector('input[name="themenbereich"]:checked')) && isValid(document.getElementById("input_title")) && isValid(document.getElementById("input_text")) && document.querySelectorAll(".btn_question_tag").length !== 0){
        formData["Themenbereich"] = document.querySelector('input[name="themenbereich"]:checked').value;
        formData["Titel"] = document.getElementById("input_title").value;
        formData["Frage"] = document.getElementById("input_text").value;

        // Get Tags
        const tags = document.querySelectorAll(".btn_question_tag")
        const Tag = [];
        for(let i = 0; i < tags.length; i++){
            Tag[i] = tags[i].textContent;
        }
        formData["Tags"] = Tag;
        

        return formData;
    }
    else{
        return null;
    }  
}

// add a tag to the tagcontainer
function addTag(text){
    const tagContainer = document.getElementById("tag_container");
    const tag = document.createElement("button");
    const tagText = document.createTextNode(text);

    // Style
    tag.classList.add("btn_topic_tag");
    tag.style.marginRight = "8px";
    tag.setAttribute("type", "button");
    tag.appendChild(tagText);
    

    tagContainer.appendChild(tag);
}

// HELPERS
// checks if element is valid
function isValid(element){
    return element !== null && element.value !== undefined && element.value !== null && element.value !== '';
}