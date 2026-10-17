# AdvikJob.com — SSC Mock Test MVP

A WordPress-first mock-test plugin using freshly written sample questions.

## Repository contents

- `wordpress-plugin/advikjob-ssc-mock-test/advikjob-ssc-mock-test.php` — WordPress plugin and shortcode
- `wordpress-plugin/advikjob-ssc-mock-test/assets/quiz.css` — responsive styling
- `wordpress-plugin/advikjob-ssc-mock-test/assets/quiz.js` — timer, question navigation, scoring and answer review
- `wordpress-plugin/advikjob-ssc-mock-test/README.md` — plugin setup instructions
- `SECURITY.md` — security and privacy scope

## MVP features

- Shortcode: `[advikjob_mock_test]`
- Multiple-choice questions with previous/next navigation
- Countdown timer, submit confirmation, score summary, and answer explanations
- Mobile-friendly layout with keyboard focus styles
- Five freshly authored demonstration questions across Reasoning, Quantitative Aptitude, English and General Awareness
- No login, personal-data collection, analytics, remote API, or saved-score functionality

## Install on a WordPress staging site

1. Download the plugin files under `wordpress-plugin/advikjob-ssc-mock-test/`.
2. Package the contents of that directory into a ZIP whose top-level folder is named `advikjob-ssc-mock-test`; the main PHP file must be directly inside that folder, with the `assets` subfolder alongside it.
3. In WordPress, open **Plugins → Add New Plugin → Upload Plugin**, upload the ZIP, and activate it.
4. Add `[advikjob_mock_test]` to a page such as **SSC Mock Test**.
5. Test the page on mobile and desktop before publishing.

## Important limitations

This is a starter MVP, not a finished high-stakes exam platform. Scores are calculated in the browser and can be manipulated; never rely on them for recruitment, certification, payments or proctored exams. Review all questions and answers for accuracy before public use.

The plugin is committed to GitHub but **has not been installed on advikjob.com**. Test on staging and back up WordPress before any production deployment. Do not commit credentials, personal data, or copyrighted question banks.

## Planned improvements

- Larger reviewed original question bank and category/subject filtering
- Shuffle questions and answer options with stable scoring
- WordPress admin question editor and server-side question management
- Automated PHP/JavaScript checks and accessibility testing
- Privacy-aware user accounts or score history only if later required
