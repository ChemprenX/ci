<!--搜索栏-->
<template>
    <div class="wrap">
        <el-row>
            <el-col :span="3">
                <h3>提交时间：</h3>
            </el-col>
            <el-col :span="3">
                <el-select v-model="year" placeholder="请选择">
                    <el-option
                            v-for="item in years"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="1"><h3>年</h3></el-col>
            <el-col :span="3">
                <el-select v-model="month" placeholder="请选择">
                    <el-option
                            v-for="month in months"
                            :key="month.value"
                            :label="month.label"
                            :value="month.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="1"><h3>月</h3></el-col>
            <el-col :span="3">
                <h3>奖项类别：</h3>
            </el-col>
            <el-col :span="3">

                <el-select v-model="award" placeholder="请选择">
                    <el-option
                            v-for="award in awards"
                            :key="award.value"
                            :label="award.label"
                            :value="award.value">
                    </el-option>
                </el-select>
            </el-col>

        </el-row>
        <el-row>
            <el-col :span="3">
                <h3>审核时间：</h3>
            </el-col>
            <el-col :span="3">
                <el-select v-model="checkYear" placeholder="请选择">
                    <el-option
                            v-for="item in years"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="1"><h3>年</h3></el-col>
            <el-col :span="3">
                <el-select v-model="checkMonth" placeholder="请选择">
                    <el-option
                            v-for="month in months"
                            :key="month.value"
                            :label="month.label"
                            :value="month.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="1"><h3>月</h3></el-col>
            <el-col :span="3">
                <h3>审核状态：</h3>
            </el-col>
            <el-col :span="3">

                <el-select v-model="checkStatusItem" placeholder="请选择">
                    <el-option
                            v-for="item in checkStatus"
                            :key="item.valueitem"
                            :label="item.label"
                            :value="item.value">
                    </el-option>
                </el-select>
            </el-col>

        </el-row>
        <el-row>
            <el-col :span="3">
                <h3>评分排序：</h3>
            </el-col>
            <el-col :span="3">
                <el-select v-model="scoreOrder" placeholder="请选择">
                    <el-option
                            v-for="item in scoreOrders"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value">
                    </el-option>
                </el-select>
            </el-col>

            <el-col :span="3">
                <el-button type="primary" icon="check">确 定</el-button>
            </el-col>
        </el-row>
        <hr>
        <el-row>
            <el-col :span="3">
                <h3>
                    搜索：
                </h3>
            </el-col>
            <el-col :span="3">
                <el-input v-model="searchInput" placeholder="请输入搜索内容"></el-input>
            </el-col>
            <el-col :span="3">
                <el-button type="primary" icon="search">搜索</el-button>
            </el-col>
        </el-row>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data() {
            return {
                year: '全部',
                month: '全部',
                award: '全部奖项',
                checkYear:'全部',
                checkMonth:'全部',
                checkStatusItem:'待审核',
                scoreOrder:'评分由高到低',
                searchInput:'',
                years: [
                    {
                        value: '全部',
                        label: '全部'
                    },
                    {
                        value: '2017',
                        label: '2017'
                    }, {
                        value: '2016',
                        label: '2016'
                    }, {
                        value: '2015',
                        label: '2015'
                    }
                ],
                months: [
                    {
                        value: '全部',
                        label: '全部'
                    },
                    {
                        value: '1',
                        label: '1'
                    }, {
                        value: '2',
                        label: '2'
                    }, {
                        value: '3',
                        label: '3'
                    }, {
                        value: '4',
                        label: '4'
                    }, {
                        value: '5',
                        label: '5'
                    }, {
                        value: '6',
                        label: '6'
                    }, {
                        value: '7',
                        label: '7'
                    }, {
                        value: '8',
                        label: '8'
                    }, {
                        value: '9',
                        label: '9'
                    }, {
                        value: '10',
                        label: '10'
                    }, {
                        value: '11',
                        label: '11'
                    }, {
                        value: '12',
                        label: '12'
                    }
                ],
                awards: [
                    {
                        value: '全部奖项',
                        label: '全部奖项'
                    },
                    {
                        value: '场景营销类',
                        label: '场景营销类'
                    },
                    {
                        value: '移动营销类',
                        label: '移动营销类'
                    },
                    {
                        value: '大屏营销类',
                        label: '大屏营销类'
                    },
                    {
                        value: '电商O2O类',
                        label: '电商O2O类'
                    },
                    {
                        value: '大数据营销类',
                        label: '大数据营销类'
                    },
                    {
                        value: 'AR/VR类',
                        label: 'AR/VR类'
                    },
                    {
                        value: '情感营销类',
                        label: '情感营销类'
                    },
                    {
                        value: '社会化营销类',
                        label: '社会化营销类'
                    },
                    {
                        value: '体育营销类',
                        label: '体育营销类'
                    },
                    {
                        value: '公益营销类',
                        label: '公益营销类'
                    },
                    {
                        value: '健康营销类',
                        label: '健康营销类'
                    },
                    {
                        value: '直播营销类',
                        label: '直播营销类'
                    },
                    {
                        value: '娱乐营销类',
                        label: '娱乐营销类'
                    },
                    {
                        value: '短视频营销类',
                        label: '短视频营销类'
                    },
                    {
                        value: '年度网络营销领军人物',
                        label: '年度网络营销领军人物'
                    },
                    {
                        value: '年度网络营销新锐人物',
                        label: '年度网络营销新锐人物'
                    },
                    {
                        value: '年度网络营销最佳数字代理机构',
                        label: '年度网络营销最佳数字代理机构'
                    },
                    {
                        value: '年度网络营销最佳品牌主',
                        label: '年度网络营销最佳品牌主'
                    },
                    {
                        value: '年度网络营销优秀产品及工具',
                        label: '年度网络营销优秀产品及工具'
                    },
                ],
                checkStatus:[
                    {
                        value:'待审核',
                        label:'待审核'
                    },
                    {
                        value:'审核通过',
                        label:'审核通过'
                    },
                    {
                        value:'审核不通过',
                        label:'审核不通过'
                    }

                ],
                scoreOrders: [
                    {
                        value: '评分由高到低',
                        label: '评分由高到低'
                    },
                    {
                        value: '评分由低到高',
                        label: '评分由低到高'
                    },
                    {
                        value: '未有评分',
                        label: '未有评分'
                    }
                ]
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
    h3
        margin: 0
        line-height: 38px
        font-size: 14px

    .el-row
        padding-top: 20px


</style>
