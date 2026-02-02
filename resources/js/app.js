import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

// フェードイン（スクロール）
export const fadeInOnScroll = (targets) => {
	gsap.fromTo(
		targets,
		{ autoAlpha: 0, y: 16 },
		{
			autoAlpha: 1,
			y: 0,
			duration: 0.6,
			ease: 'power2.out',
			stagger: 0.08,
			scrollTrigger: {
				trigger: targets,
				start: 'top 85%',
				once: true,
			},
		}
	)
}

// カードホバー（控えめ）
export const cardHover = (targets) => {
	targets.forEach((el) => {
		const img = el.querySelector('[data-gsap-img]')
		el.addEventListener('mouseenter', () => {
			gsap.to(el, { y: -4, duration: 0.25, ease: 'power2.out' })
			if (img) gsap.to(img, { scale: 1.04, duration: 0.35, ease: 'power2.out' })
		})
		el.addEventListener('mouseleave', () => {
			gsap.to(el, { y: 0, duration: 0.25, ease: 'power2.out' })
			if (img) gsap.to(img, { scale: 1, duration: 0.35, ease: 'power2.out' })
		})
	})
}

// 起動
document.addEventListener('DOMContentLoaded', () => {
	const fadeTargets = document.querySelectorAll('[data-gsap-fade]')
	if (fadeTargets.length) fadeInOnScroll(fadeTargets)

	const cards = document.querySelectorAll('[data-gsap-card]')
	if (cards.length) cardHover(Array.from(cards))
})
