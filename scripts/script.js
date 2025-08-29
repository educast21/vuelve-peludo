// preloader

var myVar;

function myFunction() {
myVar = setTimeout(showPage, 1000);
}

function showPage() {
document.getElementById("loader").style.display = "none";
document.getElementById("main").style.display = "block";
}



// JavaScript for FAQ accordion
const accordions = document.querySelectorAll(".accordion");

accordions.forEach((accordion) => {
    accordion.addEventListener("click", () => {
        accordion.classList.toggle("active");
        const panel = accordion.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
});

// JavaScript for pet type and breed selection
const optionsByCategory = {
    dog: ["Labrador Retriever", "Bulldog", "Pastor Alemán", "Golden Retriever", "Beagle", "Pomerania", "Dachshund", "Boxer", "Pug", "Rottweiler", "Shih Tzu"],
    cat: ["Persa", "Siames", "Maine Coon", "Ragdoll", "British Shorthair", "Abisinio", "Bengalí", "Burmés", "Scottish Fold", "Sphynx"],
    bird: ["Periquito", "Canario", "Cacatúa", "Agapornis", "Loro", "Guacamaya", "Cenzontle", "Jilguero", "Gorrión", "Colibrí"],
    rabbit: ["Holland Lop", "Netherland Dwarf", "Mini Rex", "Lionhead", "Mini Lop", "Flemish Giant", "English Angora", "Polish", "Himalaya", "Harlequín"],
    hamster: ["Sirio", "Ruso", "Chino", "Roborowski", "Campbell", "Albino", "Panda", "Doradito"],
    cuyo: ["Crestado", "Abyssinian", "Peruano", "Coronet", "Sheltie", "Teddy", "Texel", "Alpaca"],
    other: ["Pato", "Burro", "Gallo", "Caballo", "Cerdo", "Mapache", "Zorro", "Iguana", "Otro"]
};

function populateSecondSelect() {
    const firstSelect = document.getElementById("pettype");
    const secondSelect = document.querySelector('select[name="petBreed"]');
    const selectedCategory = firstSelect.value;

    secondSelect.innerHTML = '<option value="">Seleccione una raza * (Primero elija el tipo)</option>';

    if (selectedCategory && optionsByCategory[selectedCategory]) {
        optionsByCategory[selectedCategory].forEach(option => {
            const optionElement = document.createElement("option");
            optionElement.value = option;
            optionElement.textContent = option;
            secondSelect.appendChild(optionElement);
        });
    }
}


const photoUpload = document.getElementById("photo-upload");
const selectedPhotos = document.getElementById("selected-photos");
const previewContainer = document.getElementById("preview-container");

function removeImage(imgContainer) {
    const file = imgContainer.file;
    const fileList = Array.from(photoUpload.files);
    const index = fileList.findIndex((f) => f === file);

    if (index !== -1) {
        fileList.splice(index, 1);
        photoUpload.files = new FileList(fileList);
    }

    imgContainer.remove();
    updatePhotoCount();
}

function updatePhotoCount() {
    const selectedFiles = photoUpload.files;
    const fileCount = selectedFiles.length;

    if (fileCount === 0) {
        selectedPhotos.innerHTML = "<p>No photos selected</p>";
    } else if (fileCount === 1) {
        selectedPhotos.innerHTML = `<p>${fileCount} photo selected</p>`;
    } else {
        selectedPhotos.innerHTML = `<p>${fileCount} photos selected</p>`;
    }
}

photoUpload.addEventListener("change", function () {
    const selectedFiles = photoUpload.files;

    // Clear existing previews
    previewContainer.innerHTML = "";

    for (let i = 0; i < selectedFiles.length; i++) {
        const file = selectedFiles[i];
        const imageType = /image.*/;

        if (file.type.match(imageType)) {
            const imgContainer = document.createElement("div");
            imgContainer.className = "preview-image";

            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.width = 100; // Set the width of the thumbnail
            imgContainer.appendChild(img);

            const removeButton = document.createElement("button");
            removeButton.className = "remove-button";
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", function () {
                removeImage(imgContainer);
            });

            imgContainer.appendChild(removeButton);
            imgContainer.file = file;
            previewContainer.appendChild(imgContainer);
        }
    }

    updatePhotoCount();
});


function removeImage(imgContainer) {
    const file = imgContainer.file;
    const fileList = Array.from(photoUpload.files);
    const index = fileList.findIndex((f) => f === file);

    if (index !== -1) {
        fileList.splice(index, 1);
        // Create a new FileList object to update the input field
        const newFileList = new DataTransfer();
        fileList.forEach((file) => newFileList.items.add(file));
        photoUpload.files = newFileList.files;
    }

    imgContainer.remove();
    updatePhotoCount();
}



