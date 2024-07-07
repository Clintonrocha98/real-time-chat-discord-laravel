import './bootstrap';

const newMessage = (name, content, time) => {
  return `
    <div class="border-b border-gray-600 py-3 flex items-start  text-sm">
    <img src="https://cdn.discordapp.com/embed/avatars/0.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3" />
    <div class="flex-1 overflow-hidden">
      <div>
      <div>
        <span class="font-bold text-red-300 cursor-pointer hover:underline">${name}</span>
        <span class="font-bold text-gray-400 text-xs">${time}</span>
        </div>
          <p class="text-white leading-normal">${content}</p>
      </div>
      </div>
</div>
    `
}
const memberList = (user) => {
  return `
      <li class="flex items-center mb-2" id="user-${user.id}" >
        <img class="rounded-full mr-2 w-10 h-10" src='https://cdn.discordapp.com/embed/avatars/0.png'/>
        <span class='font-semibold text-white'>${user.name}</span>
      </li>
  `
}

const content = document.getElementById('content');
const channelId = document.getElementById('channelId').value;
const guildId = document.getElementById('guildId').value;
const userId = document.getElementById('userId').value;

const token = document.querySelector('input[name="_token"]').value;

const chatMessages = document.querySelector('#chatMenssages');
const listOfMembers = document.querySelector('#membersOn');

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
    body: JSON.stringify({ _token: token, content: content.value, channel_id: channelId, user_id: userId })
  }).catch(error => {
    console.error('Error:', error);
  });
  content.value = '';
});


Echo.private(`room.${channelId}`)
  .listen('.newMessage', function (event) {
    chatMessages.insertAdjacentHTML(
      'beforeend',
      newMessage(
        event.user.name,
        event.content,
        event.send_at
      ));
  })

Echo.join(`room.${channelId}`)
  .here((users) => {
    for (let user of users) {
      listOfMembers.insertAdjacentHTML(
        'beforeend',
        memberList(user)
      )
    }
  })
  .joining((user) => {
    listOfMembers.insertAdjacentHTML(
      'beforeend',
      memberList(user)
    )
  })
  .leaving((user) => {
    document.getElementById(`user-${user.id}`).remove();
  })
  .error((error) => {
    console.error(error);
  });