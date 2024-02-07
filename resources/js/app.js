import './bootstrap';

const classDropdown = document.getElementById('classDropdown');

classDropdown.addEventListener('change', async function(e) {
    // remove previous options
    const options = document.querySelectorAll('#sectionDropdown option');
    options.forEach(option => option.remove());

    const noSectionFound = document.querySelector('.no_sections_found');
    const classId = e.target.value;
    const url = `/data/sections/${classId}`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    });
    const data = await response.json();
    const sectionDropdownContainer = document.querySelector('.section_dropdown_container');
    if(data.length === 0) {
        sectionDropdownContainer.classList.add('hidden');
        noSectionFound.classList.remove('hidden');
        return;
    }
    noSectionFound.classList.add('hidden');
    sectionDropdownContainer.classList.remove('hidden');
    const sectionDropdown = document.getElementById('sectionDropdown');
    data.map((section) => {
        const option = document.createElement('option');
            option.value = section.id;
            option.text = section.name;
            sectionDropdown.appendChild(option);
        });
})
