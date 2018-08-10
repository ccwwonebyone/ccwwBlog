</<template>
<transition name="nav-menu">
    <el-scrollbar style="height:100%;margin-top:80px;">
    <span>Haoijia</span>
    <el-menu
      default-active="2"
      @open="handleOpen"
      @close="handleClose"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b">
      <el-submenu index="1">
        <template slot="title">
            <div>
                <i class="el-icon-location"></i>
                <span>网站</span>
            </div>
        </template>
        <el-menu-item-group>
          <!-- <template  slot="title">分组一</template> -->
          <el-menu-item index="1-1">网站概况</el-menu-item>
          <el-menu-item index="1-2">网站信息</el-menu-item>
        </el-menu-item-group>
        <el-menu-item-group title="分组2">
          <el-menu-item index="1-3">选项3</el-menu-item>
        </el-menu-item-group>
        <el-submenu index="1-4">
          <template slot="title">选项4</template>
          <el-menu-item index="1-4-1">选项1</el-menu-item>
        </el-submenu>
      </el-submenu>
      <el-submenu index="2">
        <template slot="title">
            <div>
                <i class="el-icon-menu"></i>
                <span>媒体库</span>
            </div>
        </template>
        <el-menu-item-group>
          <!-- <template  slot="title">分组一</template> -->
          <el-menu-item index="2-1">媒体库</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
      <el-menu-item index="3" disabled>
        <i class="el-icon-document"></i>
        <span slot="title">导航三</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span slot="title">导航四</span>
      </el-menu-item>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
      <div>
        asdasdass
      </div>
    </el-menu>
      </el-scrollbar>
</transition>
</template>
<script>
  export default {
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>