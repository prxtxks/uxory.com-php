import { motion } from 'framer-motion';
import React, { useEffect, useRef } from 'react';

interface AnimatedGradientBackgroundProps {
  /** Initial size of the radial gradient, defining the starting width. @default 125 */
  startingGap?: number;
  /** Enables or disables the breathing animation effect. @default false */
  Breathing?: boolean;
  /** Array of colors to use in the radial gradient. Uxory brand palette by default. */
  gradientColors?: string[];
  /** Percentage stops corresponding to each color in `gradientColors`. */
  gradientStops?: number[];
  /** Speed of the breathing animation. Lower = slower. @default 0.02 */
  animationSpeed?: number;
  /** Max range for the breathing animation in percentage points. @default 5 */
  breathingRange?: number;
  /** Additional inline styles for the gradient container. */
  containerStyle?: React.CSSProperties;
  /** Additional class names for the gradient container. */
  containerClassName?: string;
  /** Additional top offset for the gradient container. @default 0 */
  topOffset?: number;
}

/**
 * AnimatedGradientBackground - the 21st.dev component, verbatim, with the
 * rainbow default swapped for the Uxory teal palette (brand teal #12D8CC on a
 * near-black base). Renders a large radial gradient anchored near the top
 * (50% 20%) with an optional breathing effect and a framer-motion entrance.
 */
const AnimatedGradientBackground: React.FC<AnimatedGradientBackgroundProps> = ({
  startingGap = 125,
  Breathing = false,
  gradientColors = [
    '#0A0A0A', // near-black base (matches the dark page)
    '#0B3D3A', // deep teal
    '#0F766E', // teal-700
    '#12D8CC', // Uxory brand teal
    '#22D3EE', // cyan
    '#2DD4BF', // aqua / emerald-teal
    '#0E7490', // deep cyan
  ],
  gradientStops = [35, 50, 60, 70, 80, 90, 100],
  animationSpeed = 0.02,
  breathingRange = 5,
  containerStyle = {},
  topOffset = 0,
  containerClassName = '',
}) => {
  // Validation: ensure gradientStops and gradientColors lengths match
  if (gradientColors.length !== gradientStops.length) {
    throw new Error(
      `GradientColors and GradientStops must have the same length.
   Received gradientColors length: ${gradientColors.length},
   gradientStops length: ${gradientStops.length}`
    );
  }

  const containerRef = useRef<HTMLDivElement | null>(null);

  useEffect(() => {
    let animationFrame: number;
    let width = startingGap;
    let directionWidth = 1;

    const animateGradient = () => {
      if (width >= startingGap + breathingRange) directionWidth = -1;
      if (width <= startingGap - breathingRange) directionWidth = 1;

      if (!Breathing) directionWidth = 0;
      width += directionWidth * animationSpeed;

      const gradientStopsString = gradientStops
        .map((stop, index) => `${gradientColors[index]} ${stop}%`)
        .join(', ');

      const gradient = `radial-gradient(${width}% ${width + topOffset}% at 50% 20%, ${gradientStopsString})`;

      if (containerRef.current) {
        containerRef.current.style.background = gradient;
      }

      animationFrame = requestAnimationFrame(animateGradient);
    };

    animationFrame = requestAnimationFrame(animateGradient);

    return () => cancelAnimationFrame(animationFrame);
  }, [startingGap, Breathing, gradientColors, gradientStops, animationSpeed, breathingRange, topOffset]);

  return (
    <motion.div
      key="animated-gradient-background"
      initial={{ opacity: 0, scale: 1.5 }}
      animate={{
        opacity: 1,
        scale: 1,
        transition: { duration: 2, ease: [0.25, 0.1, 0.25, 1] },
      }}
      className={`absolute inset-0 overflow-hidden ${containerClassName}`}
    >
      <div ref={containerRef} style={containerStyle} className="absolute inset-0 transition-transform" />
    </motion.div>
  );
};

export default AnimatedGradientBackground;
