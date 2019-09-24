var menuApp = new Vue({
  el: '#menuMain',
data: {

  categoryValue: '',

  menu: {

    id: '',
    name: '',
    price: '',
    descrip: '',
    category: '',
    display: ''
  },

  categoryArr: []
},

    methods: {


 //hit the menu api to get all menu items and place in the menu array
 
      fetchAllMenuItems() {
        fetch('api/menu.php')
        .then( response => response.json() )
        .then( json => {
          menuApp.menu = json;
        } )
        .catch( err => {
          console.log('FETCH ERROR:');
          console.log(err);
        })
      },

      //method to pass category values for the menu switch

      categoryChange() {
          console.log(menuApp.categoryValue);
          this.fetchItemsByCategory(menuApp.categoryValue);
        },


//fetching a different API to get just the menu items for a specific category when the category value changes

        fetchItemsByCategory(cv) {
          fetch('api/menuByCategory.php?category='+cv)
          .then( response => response.json() )  // "a => expression" is shorthand function declaration
          .then( json => {
          menuApp.categoryArr = json;
          } )
          .catch( err => {
          console.log('CLIENT LIST FETCH ERROR:');
          console.log(err);
          });
        }

      },



      created () {

        //url contraints to allow values to pass in the URL

       const url = new URL(window.location.href);
       const cv = url.searchParams.get('category') || "";

//creating the category value as CV
         this.categoryValue = cv;


      //  Do data fetch on page load for all menu items
       this.fetchAllMenuItems();
      }
    });
