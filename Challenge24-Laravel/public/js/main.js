$(function () {
    let createProjectBtn = $("#createProjectBtn");
    let editProjectBtn = $("#editProjectBtn");
    let createProjectDiv = $("#createProjectDiv");
    let editProjectDiv = $("#editProjectDiv");
    let card = $(".card");
    let card_container = $(".card_container");
    let editProjectBtns = $(".editProjectBtns");
    let editProjectButton = $(".editProjectButton");
    let deleteProjectButton = $(".deleteProjectButton");
    let editForm = $(".editForm");
    let cancelForm = $(".cancelForm");

    createProjectBtn.click(function () {
        createProjectDiv.removeClass("hidden");
        editProjectDiv.addClass("hidden");
        createProjectBtn.addClass("text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500");
        createProjectBtn.removeClass("border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300");
        editProjectBtn.removeClass("text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500");
        editProjectBtn.addClass("border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300");
    })

    editProjectBtn.click(function () {
        createProjectDiv.addClass("hidden");
        editProjectDiv.removeClass("hidden");
        editProjectBtn.addClass("text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500");
        editProjectBtn.removeClass("border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300");
        createProjectBtn.removeClass("text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500");
        createProjectBtn.addClass("border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300");
    })

    card.mouseenter(function(event){
        event.currentTarget.querySelector('.editProjectButton').classList.remove('hidden')
        event.currentTarget.querySelector('.deleteProjectButton').classList.remove('hidden')
            });
    card.mouseleave(function(event){
        event.currentTarget.querySelector('.editProjectButton').classList.add('hidden')
        event.currentTarget.querySelector('.deleteProjectButton').classList.add('hidden')

    })

    editProjectButton.click(function(event){
        event.currentTarget.parentElement.parentElement.parentElement.classList.add('hidden');
        event.currentTarget.parentElement.parentElement.parentElement.parentElement.children[1].classList.remove('hidden');
    })

    cancelForm.click(function(event){
        console.log(event.currentTarget.parentElement.parentElement.parentElement.parentElement.children[0])
        event.currentTarget.parentElement.parentElement.parentElement.classList.add('hidden');
        event.currentTarget.parentElement.parentElement.parentElement.parentElement.children[0].classList.remove('hidden');
    })

});