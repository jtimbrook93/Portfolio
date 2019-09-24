var eventApp = new Vue({
  el: '#eventContainer',
data: {
  event: {
  eventid: '',
  title: '',
  date: '',
  description: '',
  display: ''
  },
eventForAdmin: {
  eventid: '',
  title: '',
  date: '',
  description: '',
  display: ''
},
eventForm: {}
},
computed: {

  },
  methods: {


    handleWorkForm(e) {
      // TODO: Check validity
      if (this.eventForm.event==="") {
        console.error('Cannot submit, invalid values');
        return;
      }
      const s = JSON.stringify(this.eventForm);

      console.log(s);

      //TODO: POST to remote server
      fetch('api/eventForAdmin.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8",
        },
        body: s
      })
// put the values into the sql table
      .then( response => response.json() )
      .then( json => {
        this.eventForAdmin.push(json)
      })
      .catch( err => {
        console.error('EVENT POST ERROR:');
        console.error(err);
      });
      // Reset workForm
      this.eventForm = this.getEmptyWorkForm();
    },

    getEmptyWorkForm() {
      return {
        eventid: this.event.eventid,
        title: '',
        date: '',
        description: '',
        display: ''
      }
    },

    //this fetch gets all of the event data that an admin can see like whether the event is diplayed or not
    
    fetchEventItemsForAdmins(){
      fetch('api/eventForAdmin.php')
      .then( response => response.json() )
      .then( json => {eventApp.eventForAdmin = json} )
      .catch( err => {
        console.error('ADMIN EVENT FETCH ERROR:');
        console.error(err);
      })
    }
  },
  created() {

    // Do data fetch on page load
    fetch('api/event.php')
    .then( response => response.json() )
    .then( json => {eventApp.event = json} )
    .catch( err => {
      console.error('EVENT FETCH ERROR:');
      console.error(err);
    })

  this.fetchEventItemsForAdmins();

},
})
