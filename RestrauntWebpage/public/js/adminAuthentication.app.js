
// code for the authorizaiton page was obtained from https://developer.okta.com/blog/2017/09/14/lazy-developers-guide-to-auth-with-vue


var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.


function validateadmin() {
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "4501" || "4502" || "4503" || "4504" || "4505" || "4506" && password == "1234"){
alert ("Login successfully");
window.open("eventsForAdmin.html"); // Redirecting to other page.
return false;
}
else{
attempt --;// Decrementing by one.
alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
if( attempt == 0){
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}
function validate() {
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "4501" || "4502" || "4503" || "4504" || "4505" || "4506" && password == "1234"){
alert ("Login successfully");
window.open("index.html"); // Redirecting to other page.
return false;
}
else{
attempt --;// Decrementing by one.
alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
if( attempt == 0){
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}

//Below is the code copied from GoogleAPI websit that I coulndt get to work properly

// (Receive authCode via HTTPS POST)

// if (request.getHeader('X-Requested-With') == null) {
//   // Without the `X-Requested-With` header, this request could be forged. Aborts.
// }

// Set path to the Web application client_secret_*.json file you downloaded from the
// Google API Console: https://console.developers.google.com/apis/credentials
// You can also find your Web application client ID and client secret from the
// console and specify them directly when you create the GoogleAuthorizationCodeTokenRequest
// object.
// String clientSecretFile = "client_secret.json";
//
// // Exchange auth code for access token
// GoogleClientSecrets clientSecrets =
//     GoogleClientSecrets.load(
//         JacksonFactory.getDefaultInstance(), new FileReader(this.clientSecretFile));
// GoogleTokenResponse tokenResponse =
//           new GoogleAuthorizationCodeTokenRequest(
//               new NetHttpTransport(),
//               JacksonFactory.getDefaultInstance(),
//               "https://www.googleapis.com/oauth2/v4/token",
//               clientSecrets.getDetails().getClientId(),
//               clientSecrets.getDetails().getClientSecret(),
//               this.authCode,
//               this.REDIRECT_URI = 'eventsForAdmin.html')  // Specify the same redirect URI that you use with your web
//                              // app. If you don't have a web version of your app, you can
//                              // specify an empty string.
//               .execute();
//
// String accessToken = tokenResponse.getAccessToken();
//
// // Use access token to call API
// GoogleCredential credential = new GoogleCredential().setAccessToken(this.accessToken);
// Drive drive =
//     new Drive.Builder(new NetHttpTransport(), JacksonFactory.getDefaultInstance(), this.credential)
//         .setApplicationName("Auth Code Exchange Demo")
//         .build();
// File file = drive.files().get("appfolder").execute();
// window.open("eventsForAdmin.html"); // Redirecting to other page.
//
// // Get profile info from ID token
// GoogleIdToken idToken = tokenResponse.parseIdToken();
// GoogleIdToken.Payload payload = idToken.getPayload();
// String userId = payload.getSubject();  // Use this value as a key to identify a user.
// String email = payload.getEmail();
// boolean emailVerified = Boolean.valueOf(payload.getEmailVerified());
// String name = (String) payload.get("name");
// String pictureUrl = (String) payload.get("picture");
// String locale = (String) payload.get("locale");
// String familyName = (String) payload.get("family_name");
// String givenName = (String) payload.get("given_name");
