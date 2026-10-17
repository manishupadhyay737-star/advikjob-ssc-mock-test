# AdvikJob SSC Mock Test — MVP Delivery Plan

## Repository status (checked 2026-10-18)
- Repository: `manishupadhyay737-star/advikjob-ssc-mock-test`
- Default branch: `main`
- Existing starter files inspected: root `README.md`, `SECURITY.md`, plugin README, plugin PHP entry point, `assets/quiz.css`, `assets/quiz.js`.
- New work is isolated on `feature/ssc-mock-test-mvp`; no existing files are overwritten by this plan.
- The current starter already provides shortcode `[advikjob_mock_test]`, five original demonstration questions, a timer, navigation and a client-side result review. It is not yet installed on the production WordPress site.

## MVP acceptance criteria
1. WordPress plugin activates on supported WordPress/PHP versions without fatal errors.
2. A page containing `[advikjob_mock_test]` renders responsive, keyboard-usable multiple-choice tests.
3. Each question has a unique ID, section, difficulty, four options, correct-answer index and a short explanation.
4. Previous/Next navigation, answer selection, countdown, submit confirmation, score and answer review work without remote scripts or third-party APIs.
5. Question text and options are escaped/sanitized on output; all UI state is scoped to each quiz instance.
6. No account, personal-data collection, analytics, persistence or network transmission is included in this MVP.
7. README contains simple installation instructions and warns that browser-calculated results are not secure for hiring, certification or high-stakes assessments.
8. Run PHP syntax checks, JavaScript syntax checks and a manual staging test before production deployment.

## WordPress integration
1. Package only `wordpress-plugin/advikjob-ssc-mock-test/` as the installable plugin ZIP, keeping its internal directory structure.
2. In WordPress Admin → Plugins → Add New Plugin → Upload Plugin, upload the ZIP and activate it.
3. Create a page named “SSC Mock Test” and insert `[advikjob_mock_test]`.
4. Verify on a staging site in desktop and mobile view, including timeout, blank answers, all-correct answers and multiple shortcode instances.
5. Publish only after factual review of questions and plugin behavior.

## Question bank design
- Initial categories: Reasoning, Quantitative Aptitude, English Comprehension, General Awareness.
- Draft only independently authored questions. Do not disguise, paraphrase or copy proprietary commercial question-bank content or past-paper text.
- Verify factual claims and answer explanations against reliable references before publishing.
- Future expansion should use a versioned JSON/PHP data file and a review checklist. Keep the MVP self-contained until the larger question bank is reviewed.

## Security/privacy boundaries
- Client-side answer keys and scores can be inspected or manipulated; never use these scores as authoritative proof for recruitment, certification, payment, or admission.
- Do not collect personal information or save scores in the initial release.
- If persistence/accounts are added, design consent, privacy notices, server-side validation, access control, abuse limits and a retention/deletion policy first.
- Never commit credentials, API keys, private user data or production database exports.

## Definition of done
- Plugin ZIP installs and activates on staging.
- Shortcode renders and all core flows pass manual tests.
- No JavaScript console errors or PHP warnings.
- Questions are original, fact-checked and accompanied by clear explanations.
- Production website is not changed without a separate explicit deployment action and verification.
