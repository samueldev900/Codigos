import * as NuBank from 'nubank';

const nubankClient = NuBank.createNuBank();


nubankClient.getLoginToken({
  password: '86375297',
  login: '33108710885', // no dashes nor dots!
}).then(response => console.log(`I'm in!`)) // just need to call this once

// After signing you can now fetch your whole feed
// since the very beginning of your relationship with NuBank <3

nubankClient
  .getWholeFeed()
  .then(history => {
    // ... doing some neat personal analysis ...
    // ... jeez, too much money spent on candies and coffee ...
  })