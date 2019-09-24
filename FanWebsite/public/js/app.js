 // obtained above and below from https://randomuser.me/ and toms repo
var app = new Vue({
  el: '#dashboard',
data: {
  "user": {

    "gender": "",
    "name": {
      "title": "",
      "first": "",
      "last": ""
    },

    "location": {

      "street": "",
      "city": "",
      "state": "",
      "postcode": ""
    },
    "email": "",
    "dob": {
      "date": "",
      "age": "", // Divide by 1000*60*60*24*365.25
    }, //date diff code obtained from https://stackoverflow.com/questions/10008050/get-age-from-birthdate

    "picture": {
      "large": "",
      "medium": "",
      "thumbnail": ""
    },
    "Nat": ""
  },//closes user
  comment: []
},//closes data


computed: {
days_left: function () {
    return moment().diff(this.user.dob.date, 'years')
  },
  date_of_birth: function () {
      return moment(this.user.dob.date).format('YYYY-MM-DD')
    }},


// obtained from https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

methods: {
  fetchResults(){
          fetch('https://randomuser.me/api/')
          .then(function(response) {return response.json()})
          .then( json => {this.user = json.results[0]})
          .catch( function (err) {
            console.log('fetch error:');
            console.log(err);
          })
  }},

  created() {

  this.fetchResults();

  const url = new URL(window.location.href);
  const id = url.searchParams.get('id');
  console.log('id: ' + id);
  this.id = id;

  if (!id) {
    //TODO: Error? 404?
    //e.g., window.location = '404.html';
  }

  // TODO: Fetch task-specific data
  // fetch('api/task?id=4')
  fetch('api/comment.php')
  .then( response => response.json() )
  .then( json => {app.comment = json} )
  .catch( err => {
    console.error('WORK POST ERROR:');
    console.error(err);
  })

  // fetch('api/team.php')
  // .then( response => response.json() )
  // .then( json => {tasksApp.teamList = json} )
  // .catch( err => {
  //   console.log('TEAM LIST ERROR:');
  //   console.log(err);
  // })
}//closes created
});//closes vue
