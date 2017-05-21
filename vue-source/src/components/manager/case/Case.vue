<template>
    <div>
        <ManagerHeader></ManagerHeader>
        <SearchBar></SearchBar>

        <div class="wrap table-wrap">
            <el-table
                    ref="multipleTable"
                    :data="tableData"
                    border
                    tooltip-effect="dark"
                    style="width: 100%"
                    @selection-change="handleSelectionChange">
                <el-table-column
                        fixed
                        type="selection"
                        width="55">
                </el-table-column>
                <el-table-column
                        fixed
                        prop="advertiser"
                        label="案例名称"
                        width="150">
                </el-table-column>
                <el-table-column
                        prop="aid"
                        label="提报奖项"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="agency_company"
                        label="上传公司"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="contact"
                        label="用户姓名"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="mobile"
                        label="手机号"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="create_time"
                        label="提交时间"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="status"
                        label="审核状态"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="check_time"
                        label="审核时间"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="checkpeople"
                        label="审核人"
                        width="140">
                </el-table-column>
                <el-table-column
                        prop="score"
                        label="评分"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="operation"
                        fixed="right"
                        label="操作"
                        width="100">
                    <template scope="scope">
                        <el-button @click.native.prevent="handleClick(scope.$index, tableData)" type="text" size="small">查看详情</el-button>
                        <el-button @click.native.prevent="rowdelete(scope.$index, tableData)" type="text" size="small">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>

            <div class="block">
                <el-pagination
                        @size-change="handleSizeChange"
                        @current-change="handleCurrentChange"
                        :page-sizes="[10, 20, 50, 100]"
                        :page-size="10"
                        layout="total, sizes, prev, pager, next, jumper"
                        :total="tableData.length">
                </el-pagination>
            </div>
            <div class="detail" :detail="detail">
                <div class="wrap">
                    <el-row>
                        <el-col :span="11">
                            <el-row>
                                <el-col :span="6">
                                    <h3 class="title-L" style="display: inline-block;">案例详情:</h3><span>{{detail.advertiser}}</span>
                                </el-col>
                                <el-col :span="6">
                                    <span> 参评奖项：</span>
                                    <span>
                                        {{detail.aid}}
                                    </span>
                                </el-col>

                            </el-row>
                            <el-row>
                                <span class="label-name">广告主姓名：</span><span>{{detail.company}}</span>
                            </el-row>
                            <el-row>
                                <span class="label-name">广告主logo：</span>
                                <img class="advertiser-img" :src="detail.advertiser_logo" />
                            </el-row>
                            <el-row>
                                <span class="label-name">代理公司名称：</span>
                                <span>{{detail.agency_company}}</span>
                            </el-row>
                            <el-row>
                                <span class="label-name">案例名称：</span>
                                <span>{{detail.advertiser}}</span>
                            </el-row>
                            <el-row>
                                <span class="label-name">作品主视觉：</span>
                                <img class="advertiser-img" :src="detail.visual_url" />
                            </el-row>
                        </el-col>

                        <el-col :span="13">
                            <el-row>
                                <h3 class="title-L">
                                    案例资料
                                </h3>

                            </el-row>
                            <el-row v-if="detail.url">
                                <h3 class="title">PPT</h3>
                                <iframe width="640" height="390" scrolling="yes" style="overflow: scroll" :src="pptUrl">
                                </iframe>
                                <a :href="detail.url" class="el-button">下载资料</a>
                            </el-row>
                            <el-row v-if="detail.video_url">
                                <h3 class="title">视频</h3>
                                <video width="640" height="390" scrolling="yes" :src="detail.video_url" controls="controls" style="background: #eeeeee">
                                </video>
                                <a :href="detail.video_url" class="el-button">下载资料</a>
                            </el-row>
                            <el-row>
                                <h3 class="title">案例状态</h3>
                            </el-row>
                        </el-col>
                    </el-row>
                    <a class="close el-icon-circle-close" @click="close"></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import ManagerHeader from '../header/Header.vue'
    import SearchBar from './SearchBar'
    var detail = document.getElementsByClassName('detail')
    export default {
        components: {
            ManagerHeader,
            SearchBar
        },
        data(){
            return {
                tableData: [],
                multipleSelection: [],
                detail: {},
                currentCase: {},
                pptUrl: '',
                videoUrl: ''
            }
        },
        methods: {
            toggleSelection(rows) {
                if (rows) {
                    rows.forEach(row => {
                        this.$refs.multipleTable.toggleRowSelection(row);
                    });
                } else {
                    this.$refs.multipleTable.clearSelection();
                }
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            //查看详情
            handleClick(index, rows) {
                var uid = parseInt(rows[index].uid);
                this.detail = rows[index];
                this.pptUrl = "http://view.officeapps.live.com/op/view.aspx?src=http://pingfen.imcc.org.cn"+this.detail.url;
                this.videoUrl = detail.video_url;
                detail[0].style.display = "block";
                this.$http.post('/index.php/api/user/userinfo',{ uid: uid })
                    .then((response) => {
                        console.log(response)
                    })
                    .catch(function (error) {
                        console.log(error);
                })
            },
            handleSizeChange(val) {
                console.log(`每页 ${val} 条`);
            },
            handleCurrentChange(val) {
                console.log(`当前页: ${val}`);
            },
            //删除
            rowdelete(index, rows){
                rows.splice(index, 1);
            },
            close(){
                detail[0].style.display = 'none'
            }
        },
        created () {

        },
        mounted () {
            this.$http.post('/index.php/manager/cases/caselist')
                .then((response) => {
                    console.log(response.data.data);
                    this.tableData = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>


<style lang="stylus" rel="stylesheet/stylus" scoped>
    .table-wrap
        margin-top: 40px
    .el-button+.el-button
        margin-left: 0
    .el-pagination
        margin: 40px
    .detail
        display: none
        width: 100%
        height: 100%
        overflow: scroll
        background: rgba(0, 0, 0, 0.5)
        z-index: 99
        position: fixed
        top: 0
        left: 0
        font-family: "Microsoft YaHei", Arial
        font-weight: 700
        font-size: 14px
        h3
            margin: 0 0 10px
        .wrap
            background: #ffffff
            position: relative
            padding: 0 20px 20px
        .title
            color: #1D8CE0
        .title-L
            color: #324057
        .el-row
            padding-top: 20px
        .close
            display: inline-block
            position: absolute
            top:0
            right:0
            width: 20px
            height: 20px
        .el-row
            text-align: left
        .advertiser-img
            vertical-align: middle
            width: 120px
            height: 60px
        .label-name
            display: inline-block
            width: 120px
</style>
