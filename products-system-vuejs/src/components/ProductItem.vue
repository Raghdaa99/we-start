<template>
    <div class="card">
        <a href="#"><img :src="img" alt=""></a>
        <div class="content">
            <div class="content-text">
                <h2><a href="">{{ name }}
                    </a></h2>
                <span>{{ price}}$</span>
            </div>
            <span>Category : {{category }}</span>
            <div class="brands"> Brands :
                {{getBrandsNames()}}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'ProductItem',
    props: ['name', 'price', 'category', 'img', 'brands'],
    methods: {
        getBrandsNames() {
            let brandsnames = [];
            this.brands.forEach(brand => {
                brandsnames.push(brand.name);
            });

            return brandsnames.join(', ');
        }
    }

}
</script>

<style scoped>
.card .content {
    padding: 8px;
    color: #000;

}

.card .content .content-text {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card .content h2 {
    margin: 0;
    font-size: 15px;
}

.card .content span {
    color: #888;
}

.card .content .content-text span {
    color: #444;
    font-weight: 600;
}

.brands {
    font-size: 13px;

}

.brands span {
    /* background-color: aqua; */
    color: #888;
    margin-right: 3px;
    /* padding: 5px;
    border-radius: 8px; */
}
</style>