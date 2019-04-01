<template>
    <!--main-->
    <div class="main">
        <!--幻灯-->
        <el-carousel :interval="2000" type="card" height="200px">
            <el-carousel-item v-for="item in showCard" :key="item.content">
                <div><img :src="item.content" alt=""></div>
            </el-carousel-item>
        </el-carousel>

        <!--搜索框-->
        <el-autocomplete
                v-model="wd"
                :fetch-suggestions="querySearchAsync"
                placeholder="请输入内容"
                @select="handleSelect"
                class="search"
                @keyup.enter.native = "clickEnter">
            <i
                    class="iconfont iconfangdajing"
                    slot="suffix"
                    @click="search">
            </i>
        </el-autocomplete>

        <!--首页导航-->
        <el-row :gutter="10" class="homaNav">
            <el-col :xs="6" :lg="6">
                <a href="">
                    <svg class="iconfont" aria-hidden="true">
                        <use xlink:href="#iconshuangsechangyongtubiao-"></use>
                    </svg>
                    <h3>分类</h3>
                </a>
            </el-col>
            <el-col :xs="6" :lg="6">
                <a href="">
                    <svg class="iconfont" aria-hidden="true">
                        <use xlink:href="#iconpaihang"></use>
                    </svg>
                    <h3>排行</h3>
                </a>
            </el-col>
            <el-col :xs="6" :lg="6">
                <a href="">
                    <svg class="iconfont" aria-hidden="true">
                        <use xlink:href="#iconbook"></use>
                    </svg>
                    <h3>完本</h3>
                </a>
            </el-col>
            <el-col :xs="6" :lg="6">
                <a href="">
                    <svg class="iconfont" aria-hidden="true">
                        <use xlink:href="#iconhuangguan"></use>
                    </svg>
                    <h3>大神</h3>
                </a>
            </el-col>
        </el-row>

        <!--滑动-->
        <el-row :gutter="10" class="module" >
            <el-col :xs="6" :lg="6"><h4 class="module-title">热门小说</h4></el-col>
            <el-col :xs="6" :lg="6" :offset="12"><span class="module-title-desc" >编辑推荐</span></el-col>
            <el-col :xs="24">
                <ol class="module-slide-ol" title="水平列表，可水平滚动">

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                    <li class="module-slide-li">
                        <a href="/book/1011207893" class="module-slide-a">
                            <img src="//bookcover.yuewen.com/qdbimg/349573/1011207893/150" class="module-slide-img" alt="还看今朝">
                            <div class="module-slide-caption">还看今朝</div>
                            <p class="module-slide-author">
                                <span>作者：</span>
                                <span class="gray">瑞根</span>
                            </p>
                        </a>
                    </li>

                </ol>
            </el-col>
        </el-row>
    </div>

</template>

<style>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;
        line-height: 200px;
        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }

    .el-carousel__item:nth-child(2n + 1) {
        background-color: #d3dce6;
    }
    .homaNav{
        text-align: center;
        margin-top: 1rem;
        font-size: 0.8rem;
    }
    .homaNav .iconfont {
        width: 2rem;
        height: 2rem;
    }
    .search{
        width: 100%;
        text-align: center;
    }
    .iconfangdajing{
        line-height: 40px;
        padding: 10px;
    }
    /*热门小说*/
    .module-title{
        border-left: solid 2px #dc3545;
        padding-left: 5px;
        font-weight: bold;
        margin: 0;
    }
    .module-title-desc{
        font-size: 0.8rem;
        color: #969ba3;
    }
    .module-slide{

    }
    .module-slide-ol {
        position: relative;
        overflow-x: auto;
        overflow-y: hidden;
        min-height: 10.75rem;
        white-space: nowrap;
        padding: 0;
        margin: 0;
    }
    .module-slide-li {
        display: inline-block;
        vertical-align: top;
        white-space: normal;
    }
    .module-slide-a {
        display: block;
        width: 5.125rem;
        padding: .75rem .5rem .5rem;
    }
    .module-slide-img {
        display: block;
        width: inherit;
        height: 6.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.3);
    }
    .module-slide-caption {
        font-size: .8125rem;
        line-height: 1.25;
        overflow: hidden;
        max-height: 2.125rem;
        margin: .5rem 0 .125rem;
    }
    .module-slide-author {
        font-size: .75rem;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #969ba3;
    }
    .module-slide-ol::-webkit-scrollbar {
        display: none;
    }
</style>
<script>
    export default {
        data() {
        return {
            //轮播图数据
            showCard: [
                {
                    content: "../src/assets/banner/01.jpg"
                },
                {
                    content: "../src/assets/banner/02.jpg"
                },
                {
                    content: "../src/assets/banner/03.jpg"
                },
                {
                    content: "../src/assets/banner/04.jpg"
                }
            ],
            restaurants: [],
            wd: '',
            timeout:  null
        };
    },
    created(){

    },
    methods: {
        loadAll()
        {
            return [
                {"value": "三全鲜食（北新泾店）", "address": "长宁区新渔路144号"},
                {"value": "Hot honey 首尔炸鸡（仙霞路）", "address": "上海市长宁区淞虹路661号"},
                {"value": "新旺角茶餐厅", "address": "上海市普陀区真北路988号创邑金沙谷6号楼113"},
                {"value": "泷千家(天山西路店)", "address": "天山西路438号"},
                {"value": "胖仙女纸杯蛋糕（上海凌空店）", "address": "上海市长宁区金钟路968号1幢18号楼一层商铺18-101"},
                {"value": "贡茶", "address": "上海市长宁区金钟路633号"},
                {"value": "豪大大香鸡排超级奶爸", "address": "上海市嘉定区曹安公路曹安路1685号"},
                {"value": "茶芝兰（奶茶，手抓饼）", "address": "上海市普陀区同普路1435号"},
                {"value": "十二泷町", "address": "上海市北翟路1444弄81号B幢-107"},
                {"value": "星移浓缩咖啡", "address": "上海市嘉定区新郁路817号"},
                {"value": "阿姨奶茶/豪大大", "address": "嘉定区曹安路1611号"},
                {"value": "新麦甜四季甜品炸鸡", "address": "嘉定区曹安公路2383弄55号"},
                {"value": "Monica摩托主题咖啡店", "address": "嘉定区江桥镇曹安公路2409号1F，2383弄62号1F"},
                {"value": "浮生若茶（凌空soho店）", "address": "上海长宁区金钟路968号9号楼地下一层"},
                {"value": "NONO JUICE  鲜榨果汁", "address": "上海市长宁区天山西路119号"},
                {"value": "CoCo都可(北新泾店）", "address": "上海市长宁区仙霞西路"},
                {"value": "快乐柠檬（神州智慧店）", "address": "上海市长宁区天山西路567号1层R117号店铺"},
                {"value": "Merci Paul cafe", "address": "上海市普陀区光复西路丹巴路28弄6号楼819"},
                {"value": "猫山王（西郊百联店）", "address": "上海市长宁区仙霞西路88号第一层G05-F01-1-306"},
                {"value": "枪会山", "address": "上海市普陀区棕榈路"},
                {"value": "纵食", "address": "元丰天山花园(东门) 双流路267号"},
                {"value": "钱记", "address": "上海市长宁区天山西路"},
                {"value": "壹杯加", "address": "上海市长宁区通协路"},
                {"value": "唦哇嘀咖", "address": "上海市长宁区新泾镇金钟路999号2幢（B幢）第01层第1-02A单元"},
                {"value": "爱茜茜里(西郊百联)", "address": "长宁区仙霞西路88号1305室"},
                {"value": "爱茜茜里(近铁广场)", "address": "上海市普陀区真北路818号近铁城市广场北区地下二楼N-B2-O2-C商铺"},
                {"value": "鲜果榨汁（金沙江路和美广店）", "address": "普陀区金沙江路2239号金沙和美广场B1-10-6"},
                {"value": "开心丽果（缤谷店）", "address": "上海市长宁区威宁路天山路341号"},
                {"value": "超级鸡车（丰庄路店）", "address": "上海市嘉定区丰庄路240号"},
                {"value": "妙生活果园（北新泾店）", "address": "长宁区新渔路144号"},
                {"value": "香宜度麻辣香锅", "address": "长宁区淞虹路148号"},
                {"value": "凡仔汉堡（老真北路店）", "address": "上海市普陀区老真北路160号"},
                {"value": "港式小铺", "address": "上海市长宁区金钟路968号15楼15-105室"},
                {"value": "蜀香源麻辣香锅（剑河路店）", "address": "剑河路443-1"},
                {"value": "北京饺子馆", "address": "长宁区北新泾街道天山西路490-1号"},
                {"value": "饭典*新简餐（凌空SOHO店）", "address": "上海市长宁区金钟路968号9号楼地下一层9-83室"},
                {"value": "焦耳·川式快餐（金钟路店）", "address": "上海市金钟路633号地下一层甲部"},
                {"value": "动力鸡车", "address": "长宁区仙霞西路299弄3号101B"},
                {"value": "浏阳蒸菜", "address": "天山西路430号"},
                {"value": "四海游龙（天山西路店）", "address": "上海市长宁区天山西路"},
                {"value": "樱花食堂（凌空店）", "address": "上海市长宁区金钟路968号15楼15-105室"},
                {"value": "壹分米客家传统调制米粉(天山店)", "address": "天山西路428号"},
                {"value": "福荣祥烧腊（平溪路店）", "address": "上海市长宁区协和路福泉路255弄57-73号"},
                {"value": "速记黄焖鸡米饭", "address": "上海市长宁区北新泾街道金钟路180号1层01号摊位"},
                {"value": "红辣椒麻辣烫", "address": "上海市长宁区天山西路492号"},
                {"value": "(小杨生煎)西郊百联餐厅", "address": "长宁区仙霞西路88号百联2楼"},
                {"value": "阳阳麻辣烫", "address": "天山西路389号"},
                {"value": "南拳妈妈龙虾盖浇饭", "address": "普陀区金沙江路1699号鑫乐惠美食广场A13"}
            ];
        },
        //queryString 为在框中输入的值
        //cb 回调函数,将处理好的数据推回
        querySearchAsync(queryString, cb) {
            var restaurants = this.restaurants;
            var results = queryString ? restaurants.filter(this.createStateFilter(queryString)) : restaurants;

            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                cb(results);
            }, 3000 * Math.random());
        },
        createStateFilter(queryString) {
            return (state) => {
                return (state.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
            };
        },
        handleSelect(item) {
            console.log(item);
            this.$router.push({path:'/' +   item.value})
        },
        search() {
            //console.log(ev);
            this.$router.push({path:'/search/' +   this.wd})
            //this.$router.push({path:'/' +   ev.value})
        },
        clickEnter(queryString) {
            console.log(this.wd);
//            this.$router.push({path:'/' +   ev.value})
        }
    },
    mounted() {
        this.restaurants = this.loadAll();
    }
    };
</script>