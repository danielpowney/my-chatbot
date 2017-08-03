=== My Chatbot ===
Contributors: dpowney
Tags: chatbot, talkbot, chat, API.AI, AI, bot, conversational, asssistant, FAQ, natural language
Requires at least: 4.0
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A artificial intelligent chatbot for WordPress powered by API.AI.

== Description ==

A artificial intelligent chatbot for WordPress powered by API.AI. [View Demo](https://danielpowney.com/my-chatbot-demo?utm_source=view-demo&utm_medium=free-plugin&utm_campaign=readme). 


* Assume the appearance of an API.AI supported messaging platform to display rich message content. Quick Replies and Image rich messages are supported
* Links in response message content are supported.
* An overlay can be added on every page to display the chatbot. The overlay can toggle up or down.
* A shortcode and widget are available to display the chatbot.
* Settings with color pickers for backgrounds and fonts, custom text (e.g. powered by) and opacity for old conversation bubbles

**[my_chatbot] Shortcode**

Attributes:

 * demo - true or false. Default is false. If true, a textarea is added below the conversation area showing the API.AI JSON response data to assist debugging.

**Follow this plugin on [GitHub](https://github.com/danielpowney/my-chatbot)**

== Installation ==

1. Install and activate the plugin.
2. Create an API.AI account, setup an agent and copy the client access token. If you're a newbie I recommend you try importing the Small Talk prebuilt agent.
3. Go to My Chatbot plugin options page under the Settings menu, enter the access token and then save
4. Add the [my_chatbot] shortcode inside the contents of a page
5  View your page and engage in conversation with your chatbot.

== Screenshots ==

1. Chatbot overlay example with rich message content
2. [my_chatbot] shortcode example
3. Plugin options
4. Plugin options continued

== Changelog ==

= 0.3 (03/08/2017) =
* Tweak: Added obverlay for mobile using CSS3 media queries for different small screens with portrait and lanscape orientations
* Added toggle CSS class to overlay for open/closed
* Added JavaScript event in frontend for extra response handling
* Added myc_shortcode_before_conversation_area action hook to [my_chatbot] shortcode template

= 0.2 (24/07/2017) =
* New: Added an overlay of the chatbot at the bottom right of every page which is enabled by default
* Tweak: Refined styles of conversation area
* New: Added default language translation files for US English
* New: Added opacity option for old conversation bubbles

= 0.1 (11/07/2017) =
 * Initial