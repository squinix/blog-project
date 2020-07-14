<template>
    <div class="text-center">
        <div class="container">
            <div class="filter-controls">
                <ul style="margin:0;padding:0;">
                    <li
                    v-for="test in tests" 
                    v-bind:key="test.id" 
                    v-bind:class="{ active:test.id == selected }" 
                    v-on:click="select(test.id)"
                    v-on:submit.prevent="onSubmit">
                        {{ test.title }}
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <transition name="animate" 
                        enter-active-class="animate__animated animate__backInLeft" 
                        leave-active-class="animate__animated animate__backOutRight">
                <div v-if="animated">
                    <div class="row" style="margin: 0;">
                        <div v-for="(article, index) in articles" :key="index" class="col-2" style="margin:0;padding:0;">
                            <div class="img__wrap">
                                <a :href="'blog/' + article.id">
                                    <img class="img__img" :src="'storage/' + article.thumbnail" :alt="article.title" width="100%">
                                    <div class="img__description_layer">
                                        <p class="img__description text-left">
                                            <small v-for="(cat, index) in article.categories" :key="index" class="text-left img__cat">
                                                {{ cat.title }}
                                                <span v-if="index+1 != article.categories.length"> / </span>
                                            </small><br>
                                            <strong class="img__title">
                                                {{ article.title }}
                                            </strong>
                                        </p>
                                    </div>    
                                </a>
                            </div>
                        </div>
                    </div>    
                </div>
            </transition>      
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.post('api/articles', {id: '1'})
                    .then(response => {
                        this.articles = response.data;
                    });
        },

        data() {
            return {
                tests: null,
                selected: 1,
                articles: null,
                animated: true
            }
        },
        
        methods: {
            select: function(id) {
                this.animated = !this.animated;
                this.selected = id;
                axios.post('api/articles', {id: id})
                    .then(response => {
                        this.articles = response.data;
                        setTimeout(() => this.animated = !this.animated, 200);
                    });
            }
        },

        created() {
            axios.post('api/vue', {})
                .then(response => {
                    this.tests = response.data;
                });
        }
    }
</script>

<style>
    /* Kategorie */
    .filter-controls {
        border-radius: 0;
        display: inline-block;
        width:100%;
        margin:0px;
        margin-bottom: 75px;
    }

    .filter-controls ul {
        list-style: none;
        margin: 0;
        padding:0;
        font-size: 17px; 
        width: 100%;
    }

    .filter-controls ul li {
        display: inline-block;
        vertical-align: top;
        width: 10%;
        font-size: 14px;
        padding: 0 6px;
        margin-right: 15px;
        margin-left: 10px;
        margin-bottom: 10px;
        text-transform: uppercase;
        position: relative;
        color: #B7B7B7;
        cursor: pointer;
    }

    .filter-controls ul li:hover, .filter-controls ul li.active {
        color: #111111;
    }

    .filter-controls ul li:before {
        position: absolute;
        content: "";
        width: 0;
        height: 6px;
        left: 0;
        bottom: 4px;
        background: #0ECE91;
        z-index: -1;
        -webkit-transition: 0.3s;
        -moz-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    .filter-controls ul li:hover:before, .filter-controls ul li.active:before {
        width: 100%;
    }


    /* Thumbnails */
    .img__wrap {
        position: relative;
        height: 100%;
        width: 100%;
        padding: 5px;
    }

    .img__description_layer {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        color: #fff;
        visibility: visible;
        opacity: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0,0,0);
        margin: 5px;
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8071603641456583) 100%, rgba(0,212,255,1) 100%);
    }

    .img__description {
        position: absolute;
        bottom: 20px;
        left: 20px;
        visibility: hidden;
        opacity: 0;
    }

    .img__title {
        font-size: 24px!important;
    }

    .img__cat {
        font-size: 12px!important;
    }

    .img__wrap:hover .img__description {
        visibility: visible;
        opacity: 1;
        animation: fadeInDown;
        animation-duration: .5s;
    }

    .img__wrap:hover .img__cat {
        animation: fadeInDown;
        animation-duration: 3s;
    }
</style>