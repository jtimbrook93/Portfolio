var employeeApp = new Vue({
  el: '#employeeContainer',
data: {

  roleValue: '',

  employee: {

  employeeid: '',
  first_name: '',
  last_name: '',
  username: '',
  password: '',
  email: '',
  role: ''
},
  roleArr: []
},

  methods: {

    fetchEmployees(){
      fetch('api/allEmployees.php')
      .then( response => response.json() )
      .then( json => {employeeApp.employee = json} )
      .catch( err => {
        console.error('EMPLOYEE FETCH ERROR:');
        console.error(err);
      })
    },

    roleChange() {
        console.log(employeeApp.roleValue);
        this.fetchEmployeesByRole(employeeApp.roleValue);
      },

    fetchEmployeesByRole(rl){
      fetch('api/employeesByRole.php?role='+rl)
      .then( response => response.json() )
      .then( json => {employeeApp.employee = json} )
      .catch( err => {
        console.error('EMPLOYEE FETCH ERROR:');
        console.error(err);
      })
    }

  },

  created() {

    const url = new URL(window.location.href);
    const rl = url.searchParams.get('role') || "";

 this.roleValue = rl

  //this.fetchEmployees();


},
})
