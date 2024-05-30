import './bootstrap';


let workProcessCount = 0;
let materialProcessCount = 0;
let partProcessCount = 0;

function addWorkProcess() {
    workProcessCount++;
    const workProcessesDiv = document.getElementById('work-processes');
    const newProcessDiv = document.createElement('div');
    newProcessDiv.classList.add('form-floating', 'mb-3');
    newProcessDiv.innerHTML = `
        <input type="text" class="form-control" id="process${workProcessCount}">
        <label for="process${workProcessCount}">Munkafolyamat ${workProcessCount}</label>
    `;
    workProcessesDiv.appendChild(newProcessDiv);
}

function addMaterialProcess() {
    materialProcessCount++;
    const workProcessesDiv = document.getElementById('material-processes');
    const newProcessDiv = document.createElement('div');
    newProcessDiv.classList.add('form-floating', 'mb-3');
    newProcessDiv.innerHTML = `
        <input type="text" class="form-control" id="process${materialProcessCount}">
        <label for="process${materialProcessCount}">Anyag ${materialProcessCount}</label>
    `;
    workProcessesDiv.appendChild(newProcessDiv);
}

function addPartProcess() {
    partProcessCount++;
    const workProcessesDiv = document.getElementById('part-processes');
    const newProcessDiv = document.createElement('div');
    newProcessDiv.classList.add('form-floating', 'mb-3');
    newProcessDiv.innerHTML = `
        <input type="text" class="form-control" id="process${partProcessCount}">
        <label for="process${partProcessCount}">Anyag ${partProcessCount}</label>
    `;
    workProcessesDiv.appendChild(newProcessDiv);
}

function print() {
    window.print();
}