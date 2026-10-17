<?php
/**
 * Plugin Name: AdvikJob SSC Mock Test
 * Description: A lightweight SSC practice quiz with original sample questions. Use [advikjob_mock_test].
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: AdvikJob.com
 * License: GPL-2.0-or-later
 * Text Domain: advikjob-ssc-mock-test
 */
if (!defined('ABSPATH')) { exit; }

final class AdvikJob_SSC_Mock_Test {
    const VERSION = '0.1.0';

    public static function init() {
        add_shortcode('advikjob_mock_test', array(__CLASS__, 'render'));
        add_action('wp_enqueue_scripts', array(__CLASS__, 'assets'));
    }

    public static function assets() {
        $url = plugin_dir_url(__FILE__);
        wp_register_style('ajsm-quiz', $url . 'assets/quiz.css', array(), self::VERSION);
        wp_register_script('ajsm-quiz', $url . 'assets/quiz.js', array(), self::VERSION, true);
    }

    private static function questions() {
        return array(
            array('id'=>'reasoning-001','section'=>'Reasoning','difficulty'=>'Easy','question'=>'Find the next number: 3, 7, 11, 15, ?','options'=>array('17','18','19','20'),'answer'=>2,'explanation'=>'Each term increases by 4, so 15 + 4 = 19.'),
            array('id'=>'math-001','section'=>'Quantitative Aptitude','difficulty'=>'Easy','question'=>'A notebook costs ₹24. What is the cost of 5 notebooks at the same rate?','options'=>array('₹100','₹110','₹120','₹125'),'answer'=>2,'explanation'=>'Total cost = 24 × 5 = ₹120.'),
            array('id'=>'english-001','section'=>'English','difficulty'=>'Easy','question'=>'Choose the word closest in meaning to “rapid”.','options'=>array('Slow','Swift','Quiet','Weak'),'answer'=>1,'explanation'=>'“Swift” means moving or happening quickly, so it is closest to “rapid”.'),
            array('id'=>'ga-001','section'=>'General Awareness','difficulty'=>'Easy','question'=>'Which part of the Indian Constitution contains the Fundamental Duties?','options'=>array('Part III','Part IVA','Part V','Part IX'),'answer'=>1,'explanation'=>'Fundamental Duties are listed in Part IVA of the Constitution.'),
            array('id'=>'reasoning-002','section'=>'Reasoning','difficulty'=>'Easy','question'=>'If each letter is shifted one place forward, PEN becomes:','options'=>array('QFO','QEN','PFM','RFO'),'answer'=>0,'explanation'=>'P→Q, E→F and N→O; therefore PEN becomes QFO.')
        );
    }

    public static function render() {
        wp_enqueue_style('ajsm-quiz');
        wp_enqueue_script('ajsm-quiz');
        $questions = array();
        foreach (self::questions() as $q) {
            $questions[] = array(
                'id' => sanitize_key($q['id']),
                'section' => sanitize_text_field($q['section']),
                'difficulty' => sanitize_text_field($q['difficulty']),
                'question' => sanitize_text_field($q['question']),
                'options' => array_map('sanitize_text_field', $q['options']),
                'answer' => absint($q['answer']),
                'explanation' => sanitize_text_field($q['explanation'])
            );
        }
        $id = wp_unique_id('ajsm-');
        $json = wp_json_encode($questions, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        ob_start();
        ?>
        <section class="ajsm-quiz" id="<?php echo esc_attr($id); ?>" data-questions="<?php echo esc_attr($json); ?>" aria-labelledby="<?php echo esc_attr($id); ?>-title">
          <header class="ajsm-header">
            <p class="ajsm-eyebrow"><?php echo esc_html__('AdvikJob.com Practice Series', 'advikjob-ssc-mock-test'); ?></p>
            <h2 id="<?php echo esc_attr($id); ?>-title"><?php echo esc_html__('SSC Mini Mock Test', 'advikjob-ssc-mock-test'); ?></h2>
            <p><?php echo esc_html__('Original practice questions · Demo test · No login required', 'advikjob-ssc-mock-test'); ?></p>
          </header>
          <div class="ajsm-meta" aria-live="polite"><span class="ajsm-progress">Question 1 of <?php echo esc_html((string) count($questions)); ?></span><span class="ajsm-timer">Time: 05:00</span></div>
          <div class="ajsm-progress-track" aria-hidden="true"><span class="ajsm-progress-fill"></span></div>
          <div class="ajsm-question-area">
            <p class="ajsm-section"></p><h3 class="ajsm-question" tabindex="-1"></h3>
            <div class="ajsm-options" role="group" aria-label="<?php echo esc_attr__('Answer options', 'advikjob-ssc-mock-test'); ?>"></div>
            <p class="ajsm-feedback" aria-live="polite"></p>
          </div>
          <nav class="ajsm-controls" aria-label="<?php echo esc_attr__('Test navigation', 'advikjob-ssc-mock-test'); ?>">
            <button type="button" class="ajsm-btn ajsm-prev"><?php echo esc_html__('Previous', 'advikjob-ssc-mock-test'); ?></button>
            <button type="button" class="ajsm-btn ajsm-next"><?php echo esc_html__('Next', 'advikjob-ssc-mock-test'); ?></button>
            <button type="button" class="ajsm-btn ajsm-submit"><?php echo esc_html__('Submit test', 'advikjob-ssc-mock-test'); ?></button>
          </nav>
          <div class="ajsm-result" hidden aria-live="polite"></div>
          <p class="ajsm-disclaimer"><?php echo esc_html__('Practice demo only. Review all questions before using them for exam preparation.', 'advikjob-ssc-mock-test'); ?></p>
        </section>
        <?php
        return ob_get_clean();
    }
}
AdvikJob_SSC_Mock_Test::init();
