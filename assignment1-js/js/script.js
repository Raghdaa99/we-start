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

prods.forEach(function (product) {
    let box = document.createElement('div');
    let name = document.createElement('h3');
    let price = document.createElement('p');
    let tags = document.createElement('div');

    box.className = 'box';
    tags.className = 'tags';


    name.innerHTML = product.name;
    price.innerHTML = product.price > 50 ? 'sale' : 'show';
    let features = product.features;
    tagsArr =features.split(', ');

    tagsArr.forEach(function (tag) {
        let tag_span = document.createElement('span');
        tag_span.innerHTML = tag;
        tags.appendChild(tag_span);
    });
    box.appendChild(name);
    box.appendChild(price);
    box.appendChild(tags);
    wrapper.appendChild(box);

})



