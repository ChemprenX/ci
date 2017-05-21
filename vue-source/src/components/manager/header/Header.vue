<template>
    <el-row>
        <el-col :span="4">
            <div class="logo">
                <img src="./logo.png" alt="金网奖">
            </div>
        </el-col>
        <el-col :span="20">
            <el-menu theme="dark" :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
                <el-menu-item index="1">
                    <router-link to="/manager"> 首页</router-link>
                </el-menu-item>
                <el-menu-item index="2">
                    <router-link to="/manager-case">案例管理</router-link>
                </el-menu-item>
                <el-menu-item index="3">
                    <router-link to="/manager-user">用户(案例)</router-link>
                </el-menu-item>
                <el-menu-item index="4">
                    <router-link to="/manager-judges">评委管理</router-link>
                </el-menu-item>
            </el-menu>
        </el-col>
    </el-row>

</template>

<script>
    export default {
        data() {
            return {
                activeIndex: '1'
            };
        },
        methods: {
           /* handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }*/
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
    .el-row
        background: #324157
        padding: 10px 0
    .el-menu--horizontal .el-menu-item
        height: 71px
        line-height: 71px
    .el-menu--horizontal .el-menu-item a, .el-menu--horizontal .el-menu-item a:hover
        display: inline-block
        line-height: 71px
        height: 71px
        font-size: 18px
        text-decoration: none
</style>
