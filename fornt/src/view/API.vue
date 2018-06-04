<template>
<div>
  <div style="width: 200px;position: absolute;left: 0px;"></div>
  <el-card class="box-card" shadow="always" style="margin-left: 190px;min-width: 800px">
    <el-row>
      <el-col :span="2" style="width: 100px;">
        <el-dropdown>
          <el-button type="primary" style="width: 100px;">
            {{request.active}}<i class="el-icon-arrow-down el-icon--right"></i>
          </el-button>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item v-for="item in request.types" :key="item" v-on:click.native="active(item)">{{item}}</el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
      </el-col>
      <el-col :span="14">
        <el-input v-model="request.url" placeholder=""></el-input>
      </el-col>
      <el-col :span="6" style="min-width: 210px;">
        <el-button-group>
          <el-button type="warning" v-on:click.native="showParams">参数</el-button>
          <el-button type="primary">发送</el-button>
          <el-button type="success">保存</el-button>
        </el-button-group>
    </el-col>
  </el-row>
  <div style="margin-top: 20px;"></div>
  <div v-if="params.show">
    <el-table
    :data="params.data"
    style="width: 100%">
    <el-table-column
      label="键"
      width="300">
      <template slot-scope="scope">
        <el-input placeholder="新键" v-model="scope.row.key"></el-input>
      </template>
    </el-table-column>
    <el-table-column
      label="值"
      width="300">
      <template slot-scope="scope">
        <el-input placeholder="值" v-model="scope.row.value"></el-input>
      </template>
    </el-table-column>
    <el-table-column label="描述">
      <template slot-scope="scope">
        <el-input placeholder="描述" v-model="scope.row.detail" v-on:mouseover.native="showdel(scope.$index)"
         v-on:mouseout.native="hiddendel(scope.$index)">
          <template slot="append"><i class="el-icon-delete" v-if="scope.row.showdel"></i></template>
        </el-input>
      </template>
    </el-table-column>
  </el-table>
  </div>

  </el-card>
</div>
</template>
<script>
  export default {
    data() {
      return {
        request:{
          types:['GET','POST','PUT','PATCH','DELETE'],
          active:'GET',
          url:''
        },
        params:{
          show:true,
          data:[{
            key:'',
            value:'',
            detail:'',
            showdel:false
          }]
        }
      }
    },
    methods: {
      active:function(item) {
        this.request.active = item;
      },
      showParams:function(){
        this.params.show = this.params.show ? false : true;
      },
      showdel:function(index){
        console.log(index,this.params.data.length-1);
        if(index != this.params.data.length-1) this.params.data[index].showdel = true;
      },
      hiddendel:function(index){
        console.log(index,this.params.data.length-1);
        if(index != this.params.data.length-1) this.params.data[index].showdel = false;
      }
    },
    watch:{
      params:{
        handler(val,oldVal){
          var data = val.data[val.data.length-1];
          console.log(data)
          if(data.key || data.value || data.detail) this.params.data.push({key:'',value:'',detail:''});
        },
        deep:true
      }
    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
body{
  background-color: #fff;
}
</style>
