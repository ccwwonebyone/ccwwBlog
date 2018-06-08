<template>
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
            <el-input placeholder="描述" v-model="scope.row.detail"
              v-on:mouseover.native="showdel(scope.$index)"
              v-on:mouseout.native ="hiddendel(scope.$index)">
              <template slot="append"><el-button slot="append" icon="el-icon-delete" v-on:click.native="removeParam(scope.$index)" v-if="scope.row.showdel"></el-button></template>
            </el-input>
          </template>
        </el-table-column>
    </el-table>
</template>
<script>
  export default {
    data() {
      return {
        params:{
          show:true,
          data:[{
            key:'',
            value:'',
            detail:'',
            showdel:false
          }]
        },
        tabs:{
          active:'body'
        }
      }
    },
    methods: {
      showParams:function(){     //显示参数列表
        this.params.show = this.params.show ? false : true;
      },
      showdel:function(index){      //显示删除按钮
        if(index != this.params.data.length-1) this.params.data[index].showdel = true;
      },
      hiddendel:function(index){    //隐藏删除按钮
        if(index != this.params.data.length-1) this.params.data[index].showdel = false;
      },
      removeParam:function(index){    //移除参数
        this.params.data.splice(index,1);
      }
    }
}
</script>