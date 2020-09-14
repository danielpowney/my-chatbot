=== My Chatbot ===
Contributors: dpowney
Tags: chatbot, Dialogflow, AI, asssistant, natural language, intent recognition, conversational
Requires at least: 4.0
Tested up to: 5.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create your own branded AI chatbot for WordPress powered by Dialogflow (formerly API.AI).

== Description ==

A artificial intelligent chatbot for WordPress powered by Dialogflow (formerly API.AI). [View Demo](https://danielpowney.com/my-chatbot-demo?utm_source=view-demo&utm_medium=free-plugin&utm_campaign=readme).

* Create your own branded chatbot
* Assume the appearance of a Dialogflow supported messaging platform to display rich message content. Currently supports quick replies and images for Facebook, and displays these as messages to your website chatbot visitors.
* Add hyperlinks in response message content using HTML markup.
* An overlay can be added on every page to display the chatbot. The overlay can toggle up or down.
* A shortcode and widget are available to display the chatbot.
* Settings with color pickers for backgrounds and fonts, custom text (e.g. powered by) and opacity for old conversation bubbles.
* Lightweight and super fast as it uses the Dialogflow Agent API to process natural language queries.
* Enable the chatbot overlay to be displayed on specific posts.
* Secure. API authentication is server-side.
* In-built template system and plenty of extensible WordPress action hooks & filters.

**[my_chatbot] Shortcode**

Attributes:

 * demo - true or false. Default is false. If true, a textarea is added below the conversation area showing the Dialogflow JSON response data to assist debugging.

**Follow this plugin on [GitHub](https://github.com/danielpowney/my-chatbot)**

== Installation ==

1. Install and activate the plugin.
2. Create a Dialogflow account, setup an agent and copy the client access token. If you're a newbie I recommend you try importing the Small Talk prebuilt agent.
3. Go to My Chatbot plugin options page under the Settings menu, enter the access token and then save
4. Add the [my_chatbot] shortcode inside the contents of a page
5.  View your page and engage in conversation with your chatbot.

== Screenshots ==

1. Chatbot overlay example with rich message content
2. [my_chatbot] shortcode example
3. Plugin options
4. Plugin options continued

== Upgrade Notice ==
= 1.0 =	
* Dialogflow v2 APIs now require a service account key file for authentication. Please review your settings.

== Changelog ==

= 1.0 (13/09/2020) =
* New: Upgraded to Dialogflow v2 APIs. Dialogflow API integration is now server side with OAuth 2.0 using a service account key file.
* Tweak: Removed Skype, Kik and Viber messaging platform support
* New: Conversation history saved in local storage

= 0.6 (15/03/2018) =
* New: Now supports multiple chatbots on the same page
* Bug: Fixed loading welcome intent when overlay is initially closed
* Tweak: Updated JavaScript and generated HTML to use classes instead of ids for some div elements as there can be more than one chatbot on the same page
* Bug: Escape text input to prevent XSS
* New: Added support for different languages https://dialogflow.com/docs/reference/language

= 0.5 (18/11/2017) =
* New: Added show loading option which is implemted using a local icon font and CSS animations
* New: Added loading dots color option
* New: Added response delay option 0 - 5000ms
* Bug: Moved setting the sesison cookie to before any HTML appears to fix headers already set warning
* Bug: Replaced Dashicon ico fonts for toggle up/down with a local icon font. It you have customized the chatbot-overlay.php template file, you will need to update it.

= 0.4 (11/09/2017) =
* New: Added myc_protocol_version filter for API query requests
* New: Added option in Edit Post screen to override displaying the chatbot overlay on specific posts
* Tweak: Added HTML5 placeholder to input text settings
* Tweak: Dialogflow rebranding required updates to various text (formerly API.AI) and changed base_url to https://api.dialogflow.com/v1/
* Tweak: Updated readme and welcome page
* New: Add input text (e.g. Ask something...) as an option
* New: Added unique session id for Dialogflow conversations using a cookie which expires after 24 hours
* New: Added myc_widget_before_conversation_area action hook to chatbot widget template
* New: Added option to show time underneath conversation bubbles
* New: Added filters to modify the access token, enable welcome event, messaging platform, session id and show time options. This allows you to have different chatbots on different pages for example.
* New: Added HTML5 required validation for required plugin settings

= 0.3 (03/08/2017) =
* Tweak: Added obverlay for mobile using CSS3 media queries for different small screens with portrait and lanscape orientations
* New: Added toggle CSS class to overlay for open/closed
* New: Added JavaScript event in frontend for extra response handling
* New: Added myc_shortcode_before_conversation_area action hook to [my_chatbot] shortcode template

= 0.2 (24/07/2017) =
* New: Added an overlay of the chatbot at the bottom right of every page which is enabled by default
* Tweak: Refined styles of conversation area
* New: Added default language translation files for US English
* New: Added opacity option for old conversation bubbles

= 0.1 (11/07/2017) =
 * Initial
