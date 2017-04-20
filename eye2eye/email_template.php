<html>
	<head>
		<link href="http://www.buakpsi.com/css/styles.css" rel="stylesheet"/>
		<link href="http://www.buakpsi.com/css/eye2eye_override.css" rel="stylesheet"/>
		<style>
			body > div {
				padding: 20px;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			// Your Client ID can be retrieved from your project in the Google
			// Developer Console, https://console.developers.google.com
			var CLIENT_ID = '192311728429-k7a6q6d96o2au70h9s4pecslc1kflt21.apps.googleusercontent.com';

			var SCOPES = ['https://www.googleapis.com/auth/gmail.send', 'https://www.googleapis.com/auth/gmail.compose', 'https://www.googleapis.com/auth/gmail.modify'];

			/**
       * Check if current user has authorized this application.
       */
			function checkAuth() {
				gapi.auth.authorize(
					{
						'client_id': CLIENT_ID,
						'scope': SCOPES.join(' '),
						'immediate': true
					}, handleAuthResult);
			}

			/**
       * Handle response from authorization server.
       *
       * @param {Object} authResult Authorization result.
       */
			function handleAuthResult(authResult) {
				var authorizeDiv = document.getElementById('authorize-div');
				if (authResult && !authResult.error) {
					// Hide auth UI, then load client library.
					authorizeDiv.style.display = 'none';
					loadGmailApi();
				} else {
					// Show auth UI, allowing the user to initiate authorization by
					// clicking authorize button.
					authorizeDiv.style.display = 'inline';
				}
			}

			/**
       * Initiate auth flow in response to user clicking authorize button.
       *
       * @param {Event} event Button click event.
       */
			function handleAuthClick(event) {
				gapi.auth.authorize(
					{client_id: CLIENT_ID, scope: SCOPES, immediate: false},
					handleAuthResult);
				return false;
			}

			/**
       * Load Gmail API client library. List labels once client library
       * is loaded.
       */
			function loadGmailApi() {
				gapi.client.load('gmail', 'v1', listLabels);
				gapi.client.load('gmail', 'v1', listDrafts);
				sendMessage();
			}

			/**
       * Print all Labels in the authorized user's inbox. If no labels
       * are found an appropriate message is printed.
       */
			function listLabels() {
				var request = gapi.client.gmail.users.labels.list({
					'userId': 'me'
				});

				request.execute(function(resp) {
					var labels = resp.labels;
					appendPre('Labels:');

					if (labels && labels.length > 0) {
						for (i = 0; i < labels.length; i++) {
							var label = labels[i];
							appendPre(label.name)
						}
					} else {
						appendPre('No Labels found.');
					}
				});
			}

			function listDrafts(userId) {
				var request = gapi.client.gmail.users.drafts.list({
					'userId': userId
				});
				request.execute(function(resp) {
					var drafts = resp.drafts;
					appendPre('Drafts:');

					if (drafts && drafts.length > 0) {
						for (i = 0; i < drafts.length; i++) {
							var label = drafts[i];
							appendPre(drafts.name)
						}
					} else {
						appendPre('No Drafts found.');
					}
				});
			}

			function utf8_to_b64(str) {
				return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
					return String.fromCharCode('0x' + p1);
				}));
			}

			function sendMessage() {
				alert("sending email")
				// Using the js-base64 library for encoding:
				// https://www.npmjs.com/package/js-base64
				var email = {
					'to': 'vkhemlani96@gmail.com',
					'from': 'eye2eyeorg@gmail.com',
					'subject': 'Sent from Website Subject'
				}
				var base64EncodedEmail = utf8_to_b64(email);
				console.log(base64EncodedEmail);
				var request = gapi.client.gmail.users.messages.send({
					'userId': me,
					'resource': {
						'raw': base64EncodedEmail
					}
				});
				request.execute(function() {
					alert("executed");
					appendPre('No Labels found.');
				});
			}

			/**
       * Append a pre element to the body containing the given message
       * as its text node.
       *
       * @param {string} message Text to be placed in pre element.
       */
			function appendPre(message) {
				var pre = document.getElementById('output');
				var textContent = document.createTextNode(message + '\n');
				pre.appendChild(textContent);
			}

		</script>
		<script src="https://apis.google.com/js/client.js?onload=checkAuth"></script>
	</head>
	<body>
		<div style="background-color: #131557">
			<img src="../img/eye2eye_logo.png" height="80">
		</div>
		<div id="authorize-div" style="">
			<span>Authorize access to Gmail API</span>
			<!--Button for the user to click to initiate auth sequence -->
			<button id="authorize-button" onclick="handleAuthClick(event)">
				Authorize
			</button>
		</div>
		<pre id="output"></pre>
	</body>
</html>