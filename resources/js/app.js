import './bootstrap';

const newMessage = (name, content, time) => {
  return `
    <div class="border-b border-gray-600 py-3 flex items-start  text-sm">
    <img src="https://cdn.discordapp.com/embed/avatars/0.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3" />
    <div class="flex-1 overflow-hidden">
        <div>
            <span class="font-bold text-red-300 cursor-pointer hover:underline">${name}</span>
            <span class="font-bold text-gray-400 text-xs">${time}</span>
        </div>
        <p class="text-white leading-normal">${content}</p>
    </div>
</div>
    `
}
const content = document.getElementById('content');
const channelId = document.getElementById('channelId').value;
const guildId = document.getElementById('guildId').value;

const token = document.querySelector('input[name="_token"]').value;

const chatMessages = document.querySelector('#chatMenssages');

document.getElementById('messageForm').addEventListener('submit', function (event) {
  event.preventDefault();

  fetch('/guilds/' + guildId + '/channels/' + channelId + '/message', {
    method: 'POST',
    headers: {
      "Accept": "application/json",
      "Content-Type": "application/json",
    },
    redirect: "follow",
    referrerPolicy: "no-referrer",
    body: JSON.stringify({ _token: token, content: content.value, channel_id: channelId })
  }).catch(error => {
    console.error('Error:', error);
  });
  content.value = '';
});


Echo.channel(`room.${channelId}`)
  .listen('.newMessage', function (event) {
    chatMessages.insertAdjacentHTML(
      'beforeend',
      newMessage(
        event.user.name,
        event.content,
        event.send_at
      ));
  })

// Echo.join(`room.${channelId}`)
//   .here((users) => {
//     for (let user of users) {
//       console.log('seila oq é isso:', user);
//     }
//   })
//   .joining((user) => {
//     console.log('joing', user);
//   })
//   .leaving((user) => {
//     console.log('leaving: ', user);
//   })
//   .error((error) => {
//     console.error(error);
//   });