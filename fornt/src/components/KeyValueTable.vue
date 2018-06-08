<template>
  <transition name="key-value-table">
    <el-table
        :data="params.data"
        v-if="params.show"
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
  </transition>
</template>
<script>
  export default {
    props: {
      params: Object,
    },
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
    },
    watch:{
      params:{    //参数列表的数据变化
        handler(val,oldVal){
          console.log(this.params.show);
          var data = val.data[val.data.length-1];
          if(data.key || data.value || data.detail) this.params.data.push({key:'',value:'',detail:'',showdel:false});
        },
        deep:true
      }
    }
}
</script>