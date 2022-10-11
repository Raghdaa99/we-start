let prods = [
    {
        name: "Product Name",
        price: 55,
        features: "cool, computer, laptop, game"
    },
    {
        name: "Product Name",
        price: 40,
        features: "cool, computer, laptop, game, nice"
    },
    {
        name: "Product Name",
        price: 60,
        features: "cool, computer, laptop, game, flex"
    }
]

let wrapper = document.querySelector('.wrapper');

// prods.forEach(function (product) {
//     let box = document.createElement('div');
//     let name = document.createElement('h3');
//     let price = document.createElement('p');
//     let tags = document.createElement('div');

//     box.className = 'box';
//     tags.className = 'tags';


//     name.innerHTML = product.name;
//     price.innerHTML = product.price > 50 ? 'sale' : 'show';
//     let features = product.features;
//     tagsArr =features.split(', ');

//     tagsArr.forEach(function (tag) {
//         let tag_span = document.createElement('span');
//         tag_span.innerHTML = tag;
//         tags.appendChild(tag_span);
//     });
//     box.appendChild(name);
//     box.appendChild(price);
//     box.appendChild(tags);
//     wrapper.appendChild(box);

// })


prods.forEach(el => { //updated ....
    let f = el.features.split(', ').map(fe => `<span>${fe}</span>`).join('');
    let box = `
        <div class="box">
            <h3>${el.name}</h3>
            <p>${el.price < 50 ? 'Sale ' + el.price : el.price}$</p>
            <div class="tags">
            ${f}
            </div>
        </div>
    `
    wrapper.innerHTML += box;
});


// Dark Theme

let body = document.querySelector('body');
let darkbtn = document.querySelector('#dark-btn');


let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () => {
    body.classList.add("dark");
    darkbtn.querySelector('i').classList.remove("fa-moon");
    darkbtn.querySelector('i').classList.add("fa-sun");
    localStorage.setItem("dark-mode", "enabled");
};

function disableDarkMode = () => {
    body.classList.remove("dark");
    darkbtn.querySelector('i').classList.add("fa-moon");
    darkbtn.querySelector('i').classList.remove("fa-sun");
    localStorage.setItem("dark-mode", "disabled");
};

if (darkMode === "enabled") {
    enableDarkMode();
} else {
    disableDarkMode();
}

darkbtn.addEventListener("click", (e) => {
    darkMode = localStorage.getItem("dark-mode");
    if (darkMode === "disabled") {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});



// context menu
let context_menu = document.querySelector('.content-menu');

function showContextMenu(show = true) {
    context_menu.style.display = show ? "block" : "none";
}

window.addEventListener("contextmenu", e => {
    e.preventDefault();
    showContextMenu();
    let x = e.offsetX;
    let y = e.offsetY;
    context_menu.style.left = `${x}px`;
    context_menu.style.top = `${y}px`;
});

window.addEventListener("click", () => {
    showContextMenu(false);
});




