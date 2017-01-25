:slug: features
:save_as: features.html

Mailman Features
~~~~~~~~~~~~~~~~

Here's a brief description of the features in Mailman 2.1 The
`NEWS <http://bazaar.launchpad.net/~mailman-coders/mailman/2.1/annotate/head:/NEWS>`__
file contains a detailed summary of all new features.

-  Through-the-web list creation and removal (with automatic support
   depending on the MTA)
-  Multi-lingual support: list web pages and email notices can be in any
   of nearly two dozen supported language, configurable per-site,
   per-list, and per-user
-  "Real name" support for members
-  Much better password-less operation for simple user tasks.
-  Support for personalized deliveries and
   `VERP <http://cr.yp.to/proto/verp.txt>`__-like message delivery for
   foolproof bounce detection
-  Emergency moderation
-  MIME-based content filtering, with demime/stripmime like options
-  Regular expression based topic filtering
-  Better membership management, including searching
-  Re-organized administrative requests pages
-  Moderated newsgroup support
-  A new architecture for the mail delivery subsystem, removing the
   dependence on cron, for better responsiveness and scalability
-  New moderation and privacy controls
-  Invitations
-  Autoresponse governors
-  Users can now change some of their delivery options globally, for all
   lists at a site, including their password, delivery status, real
   name, etc.
-  Much better MIME and I18n support in the archiver
-  A separate "list moderator" role has been added
-  Urgent: header support (bypasses digests to reach all users
   immediately).

Here is a short summary of other features in Mailman. For details,
please see the `on-line documentation <docs.html>`__.

-  Web based list administration for nearly all tasks, including list
   configuration, moderation (post approvals), management of user
   accounts.
-  Web based subscribing and unsubscribing, and user configuration
   management. Users can temporarily disable their accounts, select
   digest modes, hide their email addresses from other members, etc.
-  A customizable *home page* for each mailing list.
-  Per-list privacy features, such as closed-subscriptions, private
   archives, private membership rosters, and sender-based posting rules.
-  Configurable (per-list and per-user) delivery mode

   -  Regular (immediate) delivery
   -  MIME digest
   -  Plain (`RFC 1153 <http://www.faqs.org/rfcs/rfc1153.html>`__)
      digests

-  Integrated bounce detection within an extensible framework. Automatic
   disposition of bouncing addresses (disable, unsubscribe).
-  Integrated spam filters
-  Built-in web-based archiving, with hooks for external archivers such
   as `MHonArc <http://www.oac.uci.edu/indiv/ehood/mhonarc.html>`__.
-  Integrated Usenet gatewaying.
-  Integrated auto-replies.
-  Majordomo-style email based commands.
-  Multiple list owners and moderators are possible.
-  Support for virtual domains.
-  Runs on GNU/Linux and most Un\*x-like systems, compatible with most
   web servers and browsers, and most SMTP servers. Requires Python
   2.1.3 or newer.
-  An extensible mail delivery pipeline.
-  High-performance mail delivery, with a scalable architecture.
