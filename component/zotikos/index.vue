<template>
<transition>
    <header id="zotikos_head">
    <div class="wrap">
        <h1 class="logo wow fadeIn">
            <a :href="data.url.data"> <img :src="data.logo.data"/></a>
        </h1>
        <div class="clearfix"></div>
    </div>
    </header>
</transition>
</template>

<script>
export default{
    props: {
      data:Object
    }
}
</script>