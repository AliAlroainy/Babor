<template>

  <v-layout row >

    <v-flex class="online-users " xs2 >

      <v-list class="">

          <v-list-item class="babor white--text "
            v-for="friend in friends"
            :color="(friend.id==activeFriend)?'green':''"
            :key="friend.id"
            v-on:click="activeFriend=friend.id"
          >
            <v-list-item-action >
              <v-icon  :color="(onlineFriends.find(user=>user.id===friend.id))?'green':'red' " class="white--text">account_circle</v-icon>
            </v-list-item-action>

            <v-list-item-content >
              <v-list-item-title  class="white--text fontcolor">{{friend.name}}</v-list-item-title>
            </v-list-item-content>

            <!-- <v-list-item-avatar>
              <img v-bind:src="item.avatar">
            </v-list-item-avatar> -->
          </v-list-item>


        </v-list>

    </v-flex>

    <v-flex id="privateMessageBox" class="messages mb-5 " xs9>
       
        <message-list :user="user" :all-messages="allMessages" class="white--text babor"></message-list>

        <div class="float-start">
            <picker v-if="emoStatus" set="emojione" @select="onInput"   title="Pick your emoji…" />

        </div>

        <v-footer
                height="auto"
                fixed
               class="footer"

        >
            <v-layout row >
                <v-flex class=" text-right mt-1 ml-2" xs1>
                    <v-btn v-on:click="toggleEmo" fab dark small color="pink" class="babor">
                        <v-icon >insert_emoticon </v-icon>
                    </v-btn>
                </v-flex>

                <v-flex xs1 class="text-center ">
                    <file-upload
                            :post-action="'/private-messages/'+activeFriend"
                            ref='upload'
                            v-model="files"
                            @input-file="$refs.upload.active = true"
                            :headers="{'X-CSRF-TOKEN': token}"
                    >
                        <v-icon class="mt-3">attach_file</v-icon>
                    </file-upload>

                </v-flex>
                <v-flex xs4 >
                    <v-text-field
                            rows=2
                            v-model="message"
                            label="اكتب رسالة"
                            single-line
                            @keyup.enter="sendMessage"
                    ></v-text-field>
                </v-flex>

                <v-flex xs4>
                    <v-btn
                            v-on:click="sendMessage"
                            dark class="mt-3 ml-2 white--text babor " small color="green">ارسال</v-btn>


                </v-flex>

            </v-layout>


        </v-footer>


    </v-flex>

  </v-layout>
</template>

<script>
  import MessageList from './_message-list'
  import { Picker } from 'emoji-mart-vue'


  export default {
    props:['user'],
    components:{
      Picker,
      MessageList
    },

    data () {
      return {
        message:null,
        files:[],
        activeFriend:null,
        typingFriend:{},
        onlineFriends:[],
        allMessages:[],
        typingClock:null,
        emoStatus:false,
        users:[],
        token:document.head.querySelector('meta[name="csrf-token"]').content

      }
    },

    computed:{
      friends(){
        return this.users.filter((user)=>{
          return user.id !==this.user.id;
        })
      }
    },

    watch:{
      files:{
        deep:true,
        handler(){
          let success=this.files[0].success;
          if(success){
            this.fetchMessages();
          }
        }
      },
      activeFriend(val){
        this.fetchMessages();
      },
      '$refs.upload'(val){
        console.log(val);
      }
    },

    methods:{
      onTyping(){
        Echo.private('privatechat.'+this.activeFriend).whisper('typing',{
          user:this.user

        });
      },
      sendMessage(){

        //check if there message
        if(!this.message){
          return alert('Please enter message');
        }
        if(!this.activeFriend){
          return alert('Please select friend');
        }

          axios.post('/private-messages/'+this.activeFriend, {message: this.message}).then(response => {
                    this.message=null;
                    this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
          });
      },
      fetchMessages() {
         if(!this.activeFriend){
          return alert('Please select friend');
        }
            axios.get('/private-messages/'+this.activeFriend).then(response => {
                this.allMessages = response.data;
              setTimeout(this.scrollToEnd,100);

            });
        },
      fetchUsers() {
            axios.get('/users').then(response => {
                this.users = response.data;
                if(this.friends.length>0){
                  this.activeFriend=this.friends[0].id;
                }
            });
        },


      scrollToEnd(){
        document.getElementById('privateMessageBox').scrollTo(0,99999);
      },
      toggleEmo(){
        this.emoStatus= !this.emoStatus;
      },
      onInput(e){
        if(!e){
          return false;
        }
        if(!this.message){
          this.message=e.native;
        }else{
          this.message=this.message + e.native;
        }
        this.emoStatus=false;
      },

      onResponse(e){
        console.log('onrespnse file up',e);
      }


    },

    mounted(){
    },

    created(){
              this.fetchUsers();

              Echo.join('plchat')
              .here((users) => {
                   console.log('online',users);
                   this.onlineFriends=users;
              })
              .joining((user) => {
                  this.onlineFriends.push(user);
                  console.log('joining',user.name);
              })
              .leaving((user) => {
                  this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
                  console.log('leaving',user.name);
              });

              Echo.private('privatechat.'+this.user.id)
                .listen('PrivateMessageSent',(e)=>{
                  console.log('pmessage sent')
                  this.activeFriend=e.message.user_id;
                  this.allMessages.push(e.message)
                  setTimeout(this.scrollToEnd,100);

              })
              .listenForWhisper('typing', (e) => {

                  if(e.user.id==this.activeFriend){

                      this.typingFriend=e.user;

                    if(this.typingClock) clearTimeout();

                      this.typingClock=setTimeout(()=>{
                                            this.typingFriend={};
                                        },9000);
                  }



            });

    }

  }
</script>

<style scoped>

.online-users,.messages{
  overflow-y:scroll;
  height:100vh;
}

.babor{
  color: #e3dce9;
    background-image: linear-gradient(to top right,#a98f71, #f3a547);
    border-radius: 9px;
    margin-top: 2%;
}
.fontcolor{
color:#594327;
margin:2%
}
.footer{

 border-radius:2%;
 direction:rtl;
padding-right:25%;

}
.header{
color:#bf771c;
font-family:system-ui, -apple-system,
 "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, 
"Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:100%;

}
</style>
