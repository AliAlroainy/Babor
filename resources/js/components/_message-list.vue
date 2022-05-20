<template>
  <div  >
      <v-list
              class="p-3 messcontent"
              v-for="(message, index) in allMessages"
              :key="index"
      >
          <div class="message-wrapper mess ">
              <v-flex class=" ">
                  <span class="user  ">{{message.user.name}}</span>
              </v-flex>


              <div v-if="" class=" ">
                  <v :color="(user.id===message.user_id)?'green':'red'" text-color="white"  class="messages">
                      {{message.message}}

                  </v>

              </div>

              <div class="image-container">
                     <img v-if="message.image"  :src="'/storage/'+message.image" alt="">

              </div>

              <v-flex class="caption font-italic time">
                  {{message.created_at}}
              </v-flex>
          </div>


      </v-list>

  </div>
</template>

<script>
  export default {
    props:['user','allMessages'],

  }
</script>

<style scoped>
.chat-card{
  margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
     background-color: red;
}
.babor{
    background-color: red;
}
.time{
 color:#dfc5a3;
 font-size:3%;
 margin-top:3%;
}
.mess{
 background-color:#f5f3f0;
 padding:2%;

 width:auto;


    border-bottom-left-radius:5%;
    border-bottom-right-radius: 5%;
    border-top-right-radius: 5%;
}
.user{
color:#f79622;
padding-bottom:8%;

}
.messcontent{
direction :rtl;
}
.messages{
color:#594327;
 font-size:150%;
 margin-right:2%;
 margin-top:2%;
}

</style>
