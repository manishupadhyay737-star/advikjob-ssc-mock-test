# MVP Verification Checklist

Run this checklist against the WordPress plugin package before production use.

## Automated/static checks
- [ ] `php -l advikjob-ssc-mock-test.php` reports no syntax errors.
- [ ] `node --check assets/quiz.js` reports no syntax errors.
- [ ] Ensure all visible output is scoped to `.ajsm-quiz` so a theme's button styles do not leak into other components.
- [ ] Inspect all generated output paths for escaped content and check JSON cannot terminate its HTML attribute.
- [ ] Confirm no external requests, tracking pixels, analytics or personal-data storage exist.

## Manual functional test
- [ ] Activate on a staging WordPress install with supported PHP/WordPress.
- [ ] Add `[advikjob_mock_test]` to a test page and confirm the quiz renders.
- [ ] Check first/last navigation boundaries, selected answers after back/forward navigation, submit confirmation and timer expiry.
- [ ] Check zero answers, all correct and all incorrect cases.
- [ ] Confirm answer explanations are legible and focus moves to the next question.
- [ ] Put two shortcodes on one page and confirm both quizzes operate independently.
- [ ] Test at narrow mobile widths, keyboard-only navigation and a screen reader.
- [ ] Verify no PHP warning, JavaScript console error or layout overflow.
- [ ] Do not publish until every item passes.

## Current verification limit
GitHub file contents and branch are verified. An isolated GitHub commit is not equivalent to running a WordPress site or browser tests; no production deployment has been performed.
