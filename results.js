const addButtonList = document.querySelectorAll('.btn_add');

addButtonList.forEach(addButton => {
    addButton.addEventListener('click', () => {
        const nextElement = addButton.closest(".table-row").nextSibling.nextElementSibling;
        if (nextElement) {
            nextElement.classList.remove('hidden');
        }
    });
});