# AdvikJob SSC Mock Test — WordPress Plugin

## Install
1. Download the repository ZIP, or package the `wordpress-plugin/advikjob-ssc-mock-test` directory as a ZIP.
2. In WordPress admin, visit **Plugins → Add New Plugin → Upload Plugin**.
3. Upload the plugin ZIP and activate **AdvikJob SSC Mock Test**.
4. Add shortcode `[advikjob_mock_test]` to a new “SSC Mock Test” page.
5. Test on staging on mobile and desktop before publishing.

## Includes
- `advikjob-ssc-mock-test.php` — WordPress plugin and shortcode
- `assets/quiz.css` — responsive UI styling
- `assets/quiz.js` — timer, navigation, scoring and answer review

## MVP limits
This starter uses five freshly written demonstration questions. Check facts and answers before using them for exam preparation. Scores are calculated client-side and can be manipulated; do not use this for proctored, high-stakes, hiring, certification or payment decisions. No logins, personal-data collection, remote APIs or score storage are included.

## Safety and privacy
Before introducing accounts, saved scores, analytics, or a server-managed question bank, assess consent, privacy disclosures, retention, access control and server-side validation. Never commit API keys, passwords, or personal data.
