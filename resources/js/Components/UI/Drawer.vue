<script>
import { defineComponent, onMounted, onUnmounted } from "vue";

export default defineComponent({
	emits: ["close"],

	props: {
		show: {
			default: false,
		},
		maxWidth: {
			default: "2xl",
		},
		closeable: {
			default: true,
		},
	},

	watch: {
		show: {
			immediate: true,
			handler: (show) => {
				if (show) {
					document.body.style.overflow = "hidden";
				} else {
					document.body.style.overflow = null;
				}
			},
		},
	},

	setup(props, { emit }) {
		const close = () => {
			if (props.closeable) {
				emit("close");
			}
		};

		const closeOnEscape = (e) => {
			if (e.key === "Escape" && props.show) {
				close();
			}
		};

		onMounted(() => document.addEventListener("keydown", closeOnEscape));
		onUnmounted(() => {
			document.removeEventListener("keydown", closeOnEscape);
			document.body.style.overflow = null;
		});

		return {
			close,
		};
	},

	computed: {
		maxWidthClass() {
			return {
				sm: "sm:max-w-sm",
				md: "sm:max-w-md",
				lg: "sm:max-w-lg",
				xl: "sm:max-w-xl",
				"2xl": "sm:max-w-2xl",
				"4xl": "sm:max-w-4xl",
				"5xl": "sm:max-w-5xl",
				"6xl": "sm:max-w-6xl",
			}[this.maxWidth];
		},
	},
});
</script>


<template>
	<teleport to="body">
		<div v-show="show" class="overflow-y-auto fixed inset-0 z-10" scroll-region>
			<transition enter-active-class="transition-opacity ease-in-out duration-800" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition-opacity ease-in-out duration-800" leave-from-class="opacity-100" leave-to-class="opacity-0">
				<div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
					<div class="absolute inset-0 bg-black bg-opacity-40"></div>
				</div>
			</transition>

			<transition enter-active-class="transform ease-in-out transition-transform duration-800" enter-from-class="translate-x-full" enter-to-class="translate-x-0" leave-active-class="transform ease-in-out transition-transform duration-800" leave-from-class="translate-x-0" leave-to-class="translate-x-full">
				<div v-show="show" class="overflow-y-auto flex flex-col fixed inset-y-0 right-0 w-full max-w-sm bg-white" :class="maxWidthClass">
					<slot v-if="show"></slot>
				</div>

			</transition>
		</div>
	</teleport>
</template>
