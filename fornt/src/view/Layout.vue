<template>
    <el-form ref="form" :model="components" label-width="80px">
        <transition-group v-for="(component,i) in components" :key="i">
            <el-form-item  v-for="(mement,index) in component" :key="index" :label="mement.name">
                <transition v-if="mement.type == 'text'">
                <el-input v-model="mement.data" style="width:360px;"></el-input>
                </transition>
                <transition v-if="mement.type == 'img'">
                <el-upload style="width:360px;"
                    class="avatar-uploader"
                    drag
                    action="/admin/file">
                <i class="el-icon-upload"></i>
                <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                <div class="el-upload__tip" slot="tip">只能上传压缩文件，且不超过20M</div>
                </el-upload>
                </transition>
            </el-form-item>
        </transition-group>
        <component :is="item" :data="components[item]" :key="num" v-for="(item,num) in useComponents"></component>
    </el-form>
</template>
<script>
import components from '../components'

  export default {
    data() {
      return {
          components:{
            //   zotikos:{
            //       logo:{
            //         name:"标题",
            //         type:"img",
            //         data:"/upload/3161545713.png"
            //       },
            //       url:{
            //         name:"链接",
            //         type:"text",
            //         data:"主页"
            //       }
            //   },
            //   test:{
            //       text:{
            //           name:"测试",
            //           type:"text",
            //           data:"完美"
            //       }
            //   }
          },
          useComponents:[]
      }
    },
    methods: {
      
    },
    components:components,
    created:function(){
      
    },
    beforeCreate:function(){
        this.$axios({
          method:'get',
          url:'/admin/page/6',
        })
        .then(response => {
            this.components    = response.data.data.data;
            this.useComponents = response.data.data.component_name;
        })

    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    @import '../../../public/css/base.css';
</style>
