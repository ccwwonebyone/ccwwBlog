<template>
<transition>
    <nav>
      <div class="wrap clearfix">
        <ul class="nav">
              <transition-group v-for="(item,index) in data.url" :key="index">
                  <li class="sub"> <a :href="item.url">{item.name}</a>
                    <div class="subNav" v-if="item.children">
                        <template>
                            <p><a v-for="(subItem,subIndex) in item.children" :key="subIndex"  :href="subItem.url">{subItem.name}</a></p>
                        </template>
                    </div>
                  </li>
              </transition-group>
        </ul>
      </div>
    </nav>

    <section>
      <div class="meunBox">
        <div class="meunCont">
            <transition-group v-for="(item,index) in data.url" :key="index">
                  <dl>
                    <dt><a :href="item.url">{item.name}</a></dt>
                    <dd class="subNav" v-if="item.children">
                        <template>
                            <a v-for="(subItem,subIndex) in item.children" :key="subIndex"  :href="subItem.url">{subItem.name}</a>
                        </template>
                    </dd>
                  </dl>
              </transition-group>
        </div>
      </div>
    </section>
</transition>
</template>

<script>
export default{
    props: {
      data:Object
    }
}
</script>