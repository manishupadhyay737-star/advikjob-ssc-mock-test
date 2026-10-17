# AdvikJob.com — SSC Mock Test MVP

A WordPress-first, mobile-friendly mock test plugin using original practice questions.

## Current scope

- Shortcode-based WordPress integration: `[advikjob_mock_test]`
- Multiple-choice questions, countdown timer, navigation, submit, score and explanations
- Original demonstration questions, not copied from previous papers
- No external scripts, remote APIs, or collection of personal data in this starter
- Responsive, accessible controls; keyboard-friendly interaction

## Project status

This repository is the starter for the MVP. It is **not yet installed on advikjob.com** and should be tested on a staging WordPress site before production use.

## Install (once the plugin package is ready)

1. Download the project ZIP from GitHub or package the `wordpress-plugin/advikjob-ssc-mock-test` folder as a ZIP.
2. In WordPress admin, open **Plugins → Add New Plugin → Upload Plugin**.
3. Upload the ZIP and activate the plugin.
4. Create a page such as **SSC Mock Test** and add the shortcode `[advikjob_mock_test]`.
5. Test on mobile and desktop before publishing.

## Question integrity

All included questions are freshly authored examples for demonstrating the experience. Do not paste copyrighted question banks, commercial test content, user data, or private credentials into this repository. Review and fact-check questions before using them for exam preparation.

## Next steps

- Add a WordPress plugin with escaped output, nonce-free public read-only quiz logic, and locally hosted assets.
- Add a question schema and original reviewed questions by topic.
- Add automated static checks and accessibility QA.
- If persistent scores or accounts are introduced later, design consent, privacy notice, retention, and server-side validation first.
