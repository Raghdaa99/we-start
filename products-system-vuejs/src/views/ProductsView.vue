<template>
    <div class="products">
        <div class="sidebar">
            <aside class="shop_sidebar_area">
                <div class="catagory">
                    <h3 class="catagory-title">Catagories</h3>
                    <div class="catagories-menu">
                        <select v-model="selected">
                            <option value="-1"> All</option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="brands">
                    <h3 class="brands-title">Brands</h3>
                    <div class="widget-desc">
                        <CheckedBox v-for="(brand, index) in brands" :key="index" :id="brand.id" :name="brand.name"
                            @filterBrand="filterBrand"></CheckedBox>

                    </div>
                </div>
                <div class="price">
                    <div class="price-header">
                        <h3 class="price-title">Price</h3>
                        <button class="btn-filter">Filter</button>
                    </div>

                    <div class="price-desc">
                        <div class="min-max">
                            <div class="min">
                                <label>Min</label><span id="min-value">{{ min }}</span>
                            </div>
                            <div class="max">
                                <label>Max</label><span id="max-value">{{ max }}</span>
                            </div>
                        </div>
                        <div class="min-max-range">
                            <input type="range" min="0" max="500" class="range" id="min" v-model="min">
                            <input type="range" min="0" max="1000" class="range" id="max" v-model="max">
                        </div>
                    </div>
                </div>
                <div class="color">
                    <h3 class="color-title">Color</h3>
                    <div class="color-desc">
                        <div class="colors">
                            <ColorItem v-for="(color, index) in colors" :key="index" :color="color"
                                @filterColor="filterColor"></ColorItem>
                        </div>


                    </div>
                </div>
            </aside>
        </div>
        <div class="products-listing">
            <div class="products-actions">
                <select v-model="selectedSort">
                    <option value="-1">Short by</option>
                    <option value="sortByName">Name</option>
                    <option value="sortByPriceL">Price (Low to High)</option>
                    <option value="sortByPriceH">Price (High to Low)</option>
                </select>
            </div>
            <div class="products-items">
                <div class="wrapper">

                    <ProductItem v-for="(product, index) in displayedProducts()" :product="product"></ProductItem>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductItem from '../components/ProductItem.vue';
import CheckedBox from '../components/CheckedBox.vue';
import ColorItem from '../components/ColorItem.vue';
import products from '../products.json';
export default {
    components: {
        ProductItem,
        CheckedBox,
        ColorItem,
    },
    data() {
        return {
            selected: '-1',
            selectedSort: '-1',
            brandIds: [],
            colors_selected: [],
            products,
            categories: [
                {
                    id: 1,
                    name: 'Life'
                },
                {
                    id: 2,
                    name: 'Running'
                },
                {
                    id: 3,
                    name: 'Baseball'
                },
                {
                    id: 4,
                    name: 'Football'
                },
                {
                    id: 5,
                    name: 'Soccer'
                },
            ],
            brands: [
                {
                    id: 1,
                    name: 'Nike'
                },
                {
                    id: 2,
                    name: 'Adidas'
                },
                {
                    id: 3,
                    name: 'Gucci'
                },
                {
                    id: 4,
                    name: 'Dior'
                },
                {
                    id: 5,
                    name: 'Louis Vuiton'
                },
            ],
            colors: [
                '#B03A2E',
                '#8E44AD',
                '#F4D03F',
                '#5499C7',
                '#000000',
                '#DE3163',
            ],

            min: 0,
            max: 1000,

        }
    },
    methods: {
        displayedProducts() {
            let final = [...this.products];

            if (this.selected > -1) {
                final = final.filter((product) => {
                    return product.category.id === this.selected;
                });
            }
            if (this.brandIds.length > 0) {
                final = final.filter(product => this.getBrandsId(product.brands).some(item => this.brandIds.includes(item)));
            }
            if (this.colors_selected.length > 0) {
                final = final.filter(product => product.colors.some(item => this.colors_selected.includes(item)));
            }
            final = final.filter((product) => {
                return product.price < this.max && product.price > this.min;
            });

            if (this.selectedSort !== -1) {

                if (this.selectedSort === 'sortByName') {
                    final = this.sortByName(final);
                }
                if (this.selectedSort === 'sortByPriceL') {
                    final = this.sortByPriceL(final);
                }
                if (this.selectedSort === 'sortByPriceH') {
                    final = this.sortByPriceH(final);
                }

            }
            return final;
        },
        filterBrand(selected_brands_ids) {
            !this.brandIds.includes(selected_brands_ids) ?
                this.brandIds.push(selected_brands_ids) :
                this.brandIds.splice(this.brandIds.indexOf(selected_brands_ids), 1);
        },
        filterColor(colors_selected) {
            !this.colors_selected.includes(colors_selected) ?
                this.colors_selected.push(colors_selected) :
                this.colors_selected.splice(this.colors_selected.indexOf(colors_selected), 1);
        },
        sortByPriceL(final) {
            const result = final.sort((a, b) => a.price - b.price);
            return result;
        },
        sortByPriceH(final) {
            const result = final.sort((a, b) => b.price - a.price);
            return result;
        },
        sortByName(final) {
            const result = final.sort((a, b) => {
                const nameA = a.name.toLowerCase();
                const nameB = b.name.toLowerCase();
                if (nameA > nameB) return 1;
                if (nameA < nameB) return -1;
                return 0;
            });
            return result;
        },
        getBrandsId(brandsObject) {
            let brandsIds = [];
            brandsObject.forEach(brandObj => {
                brandsIds.push(this.brands.find(brand => brand.id == brandObj.id).id)
            })
            return brandsIds;
        },

        // filterByPrice() {
        //     let prods = [...this.displayedProducts()];
        //     prods = prods.filter((product) => {
        //         return product.price < this.max && product.price > this.min;
        //     });
        //     console.log(prods);
        //     return prods;
        // },
    }
}
</script>


<style>
.products {
    display: flex;

}


.products .sidebar {
    width: 20%;
    padding: 0 30px;
    display: flex;
    align-items: flex-start;
    justify-content: start;
    background-color: #f5f7fa;
}

@media (max-width: 767px) {
    .products {
        flex-direction: column;
    }

    .products .sidebar {
        width: 100%;
    }
}

.products-listing {
    padding: 20px 30px;
    width: 100%;
}

.catagories-menu select {
    background-color: #dedede;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 10px;
    outline: none;
}

.catagories-menu select option {
    border: none;
    padding: 10px;
}

.catagories-menu ul li a {
    color: #444;
}

.wrapper {
    /* display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap; */

    /* margin: 50px 0; */
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 5px;
}


.wrapper .card {
    /* width: 23.5%; */
    box-shadow: 0 0 10px rgb(203, 198, 198);
    margin-bottom: 20px;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    margin-right: 15px;

}

.products-actions {
    margin-bottom: 20px;
}

.products-actions select {
    padding: 10px;
    background-color: #f4f1f1;
    color: #888;
    border-radius: 5px;
}

.min-max {
    display: flex;
    justify-content: space-between;
}

.min-max span {
    font-size: 15px;
    text-align: center;
    border: 1px solid #dedede;
    margin-left: 5px;
    padding: 5px;
}

.min-max-range {
    display: flex;
    padding: 30px 0px 20px;
}

.range {
    -webkit-appearance: none;
    appearance: none;
    width: 50%;
    height: 10px;
    max-width: 400px;
    /* background-color: #dedede; */
    background-color: #dedede;
    margin: 0;
    padding: 0;
    outline: none;

}

.range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    background-color: #0070BF;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    cursor: pointer;
}

.btn-filter {
    padding: 5px 20px;
    border: none;
    border-radius: 15px;
    background-color: #0070BF;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

.btn-filter:hover {
    background-color: #4791c6;
}

.price-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 15px 0;
}

.price-header h3 {
    margin: 0;
}

.colors {
    padding-bottom: 20px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}
</style>