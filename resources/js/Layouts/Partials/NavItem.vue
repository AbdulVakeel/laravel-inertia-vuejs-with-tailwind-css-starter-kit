<script setup>
import { computed, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { Icon } from '@iconify/vue'; 

const activeClasses = computed(() => {
  return item.current ? 'text-amber-400 bg-gradient-to-r from-amber-500/15 to-transparent border-l-2 border-amber-400 shadow-[inset_0_1px_2px_rgba(255,255,255,0.05)]' : 'text-gray-300';
});

const iconActiveClasses = computed(() => {
  return item.current ? 'text-amber-400 drop-shadow-[0_0_8px_rgba(245,158,11,0.5)]' : 'text-gray-400';
});

const emit = defineEmits(['onClick']);
const { item, linkClass } = defineProps({
  item: [Object],
  linkClass: [String],
});

// For ripple effect
const handleRipple = (e) => {
  const ripple = document.createElement('span');
  ripple.classList.add('ripple-effect');
  const rect = e.currentTarget.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);
  ripple.style.width = ripple.style.height = size + 'px';
  ripple.style.left = e.clientX - rect.left - size/2 + 'px';
  ripple.style.top = e.clientY - rect.top - size/2 + 'px';
  e.currentTarget.appendChild(ripple);
  setTimeout(() => ripple.remove(), 600);
};
</script>

<template>
  <!-- Dashboard Style Divider -->
  <div v-if="item.divider && item.visible" class="divider-container">
    <div class="divider-line"></div>
    <div class="divider-text">
      <span>{{ item.divider }}</span>
      <div class="divider-glow"></div>
    </div>
    <div class="divider-line"></div>
  </div>

  <!-- Dashboard Style Single Menu Item -->
  <div v-else-if="!item.children?.length" class="menu-item-wrapper">
    <Link
      preserve-scroll
      v-if="item.visible"
      :href="item.href"
      :class="[ 
        'menu-item group',
        activeClasses,
        linkClass,
      ]"
      @click="(e) => { handleRipple(e); emit('onClick'); }"
    >
      <!-- Icon Container -->
      <div class="icon-container">
        <!-- Background Orb -->
        <div class="icon-orb"></div>
        
        <!-- Main Icon -->
        <Icon
          v-if="item.icon"
          :icon="item.icon"
          class="menu-icon"
          :class="iconActiveClasses"
        />
        <Icon
          v-else
          icon="mdi:circle-small"
          class="menu-icon-dot"
          :class="iconActiveClasses"
        />
        
        <!-- Active Indicator -->
        <div v-if="item.current" class="active-dot">
          <span class="active-pulse"></span>
        </div>
      </div>

      <!-- Label with Gradient Effect -->
      <span class="menu-label">
        <span class="label-text">{{ item.name }}</span>
        <span class="label-gradient">{{ item.name }}</span>
      </span>
      
      <!-- Dashboard Style Shine Effect -->
      <div class="menu-shine"></div>
    </Link>
  </div>

  <!-- Dashboard Style Dropdown Menu Item -->
  <Disclosure v-else-if="item.children?.length && item.visible" as="div" class="menu-item-wrapper" v-slot="{ open }" :default-open="item.current">
    <DisclosureButton
      :class="[ 
        'menu-item group w-full text-left',
        activeClasses,
        { 'menu-item-open': open }
      ]"
      @click="handleRipple"
    >
      <!-- Icon Container -->
      <div class="icon-container">
        <div class="icon-orb"></div>
        <Icon :icon="item.icon" class="menu-icon" :class="iconActiveClasses" />
        <div v-if="item.current" class="active-dot">
          <span class="active-pulse"></span>
        </div>
      </div>
      
      <!-- Label -->
      <span class="menu-label">
        <span class="label-text">{{ item.name }}</span>
        <span class="label-gradient">{{ item.name }}</span>
      </span>
      
      <!-- Arrow with Animation -->
      <div class="arrow-container">
        <Icon
          icon="mdi:chevron-down"
          class="menu-arrow"
          :class="{ 'menu-arrow-open': open }"
        />
        <div class="arrow-glow"></div>
      </div>
      
      <!-- Shine Effect -->
      <div class="menu-shine"></div>
    </DisclosureButton>

    <!-- Dashboard Style Submenu -->
    <DisclosurePanel class="submenu-container">
      <div class="submenu">
        <!-- Animated Line -->
        <div class="submenu-line">
          <span class="line-orb" style="top: 20%"></span>
        </div>
        
        <!-- Submenu Items -->
        <div class="submenu-items">
          <NavItem 
            v-for="(subItem, i) in item.children" 
            :key="i" 
            :item="subItem" 
            :link-class="linkClass" 
            @onClick="emit('onClick')"  
          />
        </div>
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>

<style scoped>
/* ===== DIVIDER - DASHBOARD STYLE ===== */
.divider-container {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin: 1.5rem 0 1rem;
  padding: 0 0.75rem;
  position: relative;
}

.divider-line {
  flex: 1;
  height: 1px;
  background: linear-gradient(90deg, 
    transparent,
    rgba(245, 158, 11, 0.3),
    rgba(251, 191, 36, 0.5),
    rgba(245, 158, 11, 0.3),
    transparent
  );
}

.divider-text {
  color: #fbbf24;
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  padding: 0.25rem 1rem;
  background: rgba(245, 158, 11, 0.1);
  border-radius: 20px;
  border: 1px solid rgba(245, 158, 11, 0.2);
  position: relative;
  overflow: hidden;
  backdrop-filter: blur(5px);
}

.divider-glow {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at center, rgba(245, 158, 11, 0.3), transparent 70%);
  animation: glowPulse 2s infinite;
}

@keyframes glowPulse {
  0%, 100% { opacity: 0.3; }
  50% { opacity: 0.8; }
}

/* ===== MENU ITEM ===== */
.menu-item-wrapper {
  position: relative;
  margin: 0.2rem 0;
}

.menu-item {
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  padding: 0.65rem 0.75rem;
  border-radius: 12px;
  font-size: 0.9rem;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.3s ease;
  overflow: hidden;
  isolation: isolate;
  cursor: pointer;
  border: none;
  background: transparent;
  backdrop-filter: blur(5px);
}

.menu-item:hover {
  background: rgba(245, 158, 11, 0.08);
  transform: translateX(4px);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

/* ===== ICON CONTAINER ===== */
.icon-container {
  position: relative;
  margin-right: 0.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
}

.icon-orb {
  position: absolute;
  inset: -4px;
  background: radial-gradient(circle, rgba(245, 158, 11, 0.2), transparent 70%);
  border-radius: 50%;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.menu-item:hover .icon-orb {
  opacity: 1;
  animation: orbRotate 3s linear infinite;
}

@keyframes orbRotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.menu-icon {
  width: 18px;
  height: 18px;
  transition: all 0.3s ease;
  position: relative;
  z-index: 2;
}

.menu-item:hover .menu-icon {
  transform: scale(1.15) rotate(3deg);
  filter: drop-shadow(0 0 8px rgba(245, 158, 11, 0.6));
}

.menu-icon-dot {
  width: 8px;
  height: 8px;
  transition: all 0.3s ease;
  position: relative;
  z-index: 2;
}

.menu-item:hover .menu-icon-dot {
  transform: scale(1.8);
  filter: drop-shadow(0 0 8px rgba(245, 158, 11, 0.6));
}

/* ===== ACTIVE INDICATOR ===== */
.active-dot {
  position: absolute;
  right: -4px;
  top: 50%;
  transform: translateY(-50%);
  width: 6px;
  height: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.active-pulse {
  width: 100%;
  height: 100%;
  background: #fbbf24;
  border-radius: 50%;
  box-shadow: 0 0 10px #fbbf24;
  animation: activePulse 2s infinite;
}

@keyframes activePulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.5); opacity: 0.7; }
}

/* ===== LABEL WITH GRADIENT ===== */
.menu-label {
  flex: 1;
  text-align: left;
  font-size: 0.9rem;
  font-weight: 500;
  white-space: nowrap;
  position: relative;
  height: 1.2rem;
  overflow: hidden;
}

.label-text {
  position: absolute;
  left: 0;
  top: 0;
  transition: all 0.3s ease;
  color: inherit;
}

.label-gradient {
  position: absolute;
  left: 0;
  top: 0;
  background: linear-gradient(90deg, #fbbf24, #f59e0b, #fbbf24);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  opacity: 0;
  transform: translateY(100%);
  transition: all 0.3s ease;
  white-space: nowrap;
}

.menu-item:hover .label-text {
  transform: translateY(-100%);
  opacity: 0;
}

.menu-item:hover .label-gradient {
  transform: translateY(0);
  opacity: 1;
}

/* ===== ARROW ===== */
.arrow-container {
  position: relative;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 0.5rem;
}

.menu-arrow {
  width: 16px;
  height: 16px;
  color: #9ca3af;
  transition: all 0.3s ease;
  position: relative;
  z-index: 2;
}

.menu-arrow-open {
  transform: rotate(180deg);
  color: #fbbf24;
}

.menu-item:hover .menu-arrow {
  color: #fbbf24;
}

.arrow-glow {
  position: absolute;
  inset: -4px;
  background: radial-gradient(circle, rgba(245, 158, 11, 0.3), transparent 70%);
  border-radius: 50%;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.menu-item:hover .arrow-glow {
  opacity: 1;
}

/* ===== SHINE EFFECT ===== */
.menu-shine {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, 
    transparent,
    rgba(255, 255, 255, 0.05),
    rgba(255, 255, 255, 0.1),
    rgba(255, 255, 255, 0.05),
    transparent
  );
  transition: left 0.5s ease;
  pointer-events: none;
}

.menu-item:hover .menu-shine {
  left: 100%;
}

/* ===== SUBMENU ===== */
.submenu-container {
  overflow: hidden;
  animation: slideDown 0.3s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.submenu {
  margin-left: 2rem;
  margin-top: 0.25rem;
  padding-left: 0.75rem;
  position: relative;
}

/* Submenu Line with Orbs */
.submenu-line {
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 2px;
  background: linear-gradient(to bottom, 
    transparent,
    rgba(245, 158, 11, 0.3),
    rgba(251, 191, 36, 0.5),
    rgba(245, 158, 11, 0.3),
    transparent
  );
}

.line-orb {
  position: absolute;
  left: -3px;
  width: 8px;
  height: 8px;
  background: #fbbf24;
  border-radius: 50%;
  filter: blur(2px);
  animation: orbFloat 3s ease infinite;
}

@keyframes orbFloat {
  0%, 100% { transform: translateY(0) scale(1); opacity: 0.5; }
  50% { transform: translateY(-3px) scale(1.2); opacity: 1; }
}

/* Submenu Items */
.submenu-items {
  position: relative;
  z-index: 2;
}

.submenu-items :deep(.menu-item) {
  padding: 0.5rem 0.75rem;
  font-size: 0.85rem;
  animation: slideIn 0.3s ease forwards;
  opacity: 0;
  transform: translateX(-10px);
}

.submenu-items :deep(.menu-item:nth-child(1)) { animation-delay: 0.05s; }
.submenu-items :deep(.menu-item:nth-child(2)) { animation-delay: 0.1s; }
.submenu-items :deep(.menu-item:nth-child(3)) { animation-delay: 0.15s; }
.submenu-items :deep(.menu-item:nth-child(4)) { animation-delay: 0.2s; }
.submenu-items :deep(.menu-item:nth-child(5)) { animation-delay: 0.25s; }

@keyframes slideIn {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.submenu-items :deep(.menu-icon) {
  width: 14px;
  height: 14px;
}

/* ===== RIPPLE EFFECT ===== */
:deep(.ripple-effect) {
  position: absolute;
  border-radius: 50%;
  background: rgba(245, 158, 11, 0.2);
  transform: scale(0);
  animation: ripple 0.6s ease-out;
  pointer-events: none;
  z-index: 5;
}

@keyframes ripple {
  to {
    transform: scale(4);
    opacity: 0;
  }
}

/* ===== COLLAPSED STATE ===== */
:deep(.nav-item-collapsed) {
  justify-content: center !important;
  padding: 0.65rem !important;
}

:deep(.nav-item-collapsed .menu-label) {
  display: none !important;
}

:deep(.nav-item-collapsed .icon-container) {
  margin-right: 0 !important;
}

:deep(.nav-item-collapsed .menu-arrow) {
  display: none !important;
}

/* ===== MOBILE RESPONSIVE ===== */
@media (max-width: 768px) {
  .menu-item {
    padding: 0.75rem 1rem;
  }
  
  .submenu {
    margin-left: 1.5rem;
  }
}
</style>