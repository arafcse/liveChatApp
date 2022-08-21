require('./bootstrap');

import { createApp } from 'vue';

import chat from './components/chat.vue';
import Posts from './components/posts.vue';

const app = createApp({});

app.component('chat',chat);
app.component('posts',Posts);


app.mount("#app");