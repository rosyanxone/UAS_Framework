function enggak() {
    var openStore = document.getElementById('namaToko');
    // var disable = document.createAttribute('hidden');
    
    openStore.removeAttribute('required');
    // openStore.setAttributeNode(disable);
    document.getElementById("namaToko").value = "false";
}

function boleh() {
    var openStore = document.getElementById('namaToko');
    var able = document.createAttribute('required');

    // openStore.removeAttribute('hidden');
    openStore.setAttributeNode(able);
    document.getElementById("namaToko").value = "";
}

function onLoad(kelas, kelas2) {
    var group1 = document.getElementById('tokoDiv');
    group1.classList.remove(kelas);
    group1.classList.add(kelas2);
}