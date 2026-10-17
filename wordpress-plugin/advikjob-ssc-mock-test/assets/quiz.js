(function () {
'use strict';
function init(root) {
 if (root.dataset.ajsmReady === '1') return;
 root.dataset.ajsmReady = '1';
 let qs;
 try { qs = JSON.parse(root.getAttribute('data-questions') || '[]'); } catch (e) { root.textContent = 'Quiz could not load. Refresh the page.'; return; }
 if (!Array.isArray(qs) || !qs.length) { root.textContent = 'No questions available.'; return; }
 const $ = s => root.querySelector(s), progress=$('.ajsm-progress'), timerLabel=$('.ajsm-timer'), fill=$('.ajsm-progress-fill'), section=$('.ajsm-section'), prompt=$('.ajsm-question'), options=$('.ajsm-options'), feedback=$('.ajsm-feedback'), prev=$('.ajsm-prev'), next=$('.ajsm-next'), submit=$('.ajsm-submit'), result=$('.ajsm-result');
 let idx=0, answers=new Array(qs.length).fill(null), seconds=Math.max(60,qs.length*60), done=false, interval;
 function clock(){const m=String(Math.floor(seconds/60)).padStart(2,'0'),s=String(seconds%60).padStart(2,'0');timerLabel.textContent='Time: '+m+':'+s;}
 function render(){const q=qs[idx];progress.textContent='Question '+(idx+1)+' of '+qs.length;fill.style.width=((idx+1)/qs.length*100)+'%';section.textContent=q.section+' · '+q.difficulty;prompt.textContent=q.question;options.replaceChildren();
 q.options.forEach((label,i)=>{const b=document.createElement('button');b.type='button';b.className='ajsm-option';b.setAttribute('aria-pressed',answers[idx]===i?'true':'false');const mark=document.createElement('span');mark.className='ajsm-option-mark';mark.setAttribute('aria-hidden','true');mark.textContent=String.fromCharCode(65+i);const text=document.createElement('span');text.textContent=label;b.append(mark,text);b.addEventListener('click',()=>{if(done)return;answers[idx]=i;render();});options.appendChild(b);});
 feedback.textContent=answers[idx]===null?'Choose one answer.':'Answer selected.';prev.disabled=idx===0||done;next.disabled=idx===qs.length-1||done;submit.disabled=done;}
 function finish(expired){if(done)return;done=true;clearInterval(interval);const score=qs.reduce((n,q,i)=>n+(answers[i]===q.answer?1:0),0),attempted=answers.filter(a=>a!==null).length;result.replaceChildren();const h=document.createElement('h3');h.textContent=expired?'Time is up — Result':'Test Result';const summary=document.createElement('p');summary.textContent='Score: '+score+' / '+qs.length+' · Attempted: '+attempted+' · Accuracy: '+(attempted?Math.round(score/attempted*100):0)+'%';result.append(h,summary);const list=document.createElement('ol');qs.forEach((q,i)=>{const li=document.createElement('li');li.className='ajsm-review-item';const p=document.createElement('p');p.textContent=q.question;const status=document.createElement('p');const correct=answers[i]===q.answer;status.className=correct?'ajsm-correct':'ajsm-wrong';status.textContent=(correct?'Correct':'Incorrect or unanswered')+' · Correct answer: '+q.options[q.answer];const explanation=document.createElement('p');explanation.textContent=q.explanation;li.append(p,status,explanation);list.appendChild(li);});result.appendChild(list);result.hidden=false;feedback.textContent='Test submitted. Review your answers below.';render();submit.disabled=true;submit.textContent='Submitted';}
 prev.addEventListener('click',()=>{if(!done&&idx>0){idx--;render();prompt.focus();}});next.addEventListener('click',()=>{if(!done&&idx<qs.length-1){idx++;render();prompt.focus();}});submit.addEventListener('click',()=>{if(window.confirm('Submit your test? You cannot change answers afterward.'))finish(false);});
 render();clock();interval=window.setInterval(()=>{if(done)return;seconds=Math.max(0,seconds-1);clock();if(seconds===0)finish(true);},1000);
}
function boot(){document.querySelectorAll('.ajsm-quiz').forEach(init);}
if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',boot);else boot();
})();